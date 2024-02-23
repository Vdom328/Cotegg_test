<?php

namespace App\Http\Controllers\user;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('user.auth.aut-signin');
    }

    public function postLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->status == Config::get('const.status.no')) {
                Auth::logout();
                Session::flash('error', "Your account is suspended.");
                return redirect()->back();
            }
            $request->session()->regenerate();

            Session::flash('success', "Log in successfully !");
            return redirect()->route('user.home.index');
        }
        Session::flash('error', "The provided credentials do not match our records.");
        return redirect()->back();
    }


    public function getLogout(): RedirectResponse
    {
        Auth::logout();
        Session::flash('success', "You have been logged out successfully.");
        return redirect()->route('user.auth.getLogin');
    }

    public function getForgot()
    {
        return view('user.auth.aut-password');
    }

    public function postForgot(Request $request)
    {
        $email = $request->email;

        $user = User::where('email', $email)->first();

        if (!$user) {
            Session::flash('error', "Email not found");
            return redirect()->back();
        }

        if ($request->input('password') != $request->input('confirm-password')) {
            Session::flash('error', "You must enter the same password and confirm password!");
            return redirect()->back();
        }

        $user->update([
            'password' => Hash::make($request->input('password')),
            'password_text' => $request->input('password'),
        ]);

        Session::flash('success', "Forgot successfully!");
        return redirect()->route('user.auth.getLogin');
    }


    public function register()
    {
        return view('user.auth.aut-register');
    }

    public function postRegister(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email','unique:users,email'],
            'password' => ['required'],

        ]);

        if ($request->input('password') != $request->input('confirm-password')) {
            Session::flash('error', "You must enter the same password and confirm password!");
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            $create = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'password_text' => $request->input('password'),
                'status' => Config::get('const.status.yes'),
            ];

            $user = User::create($create);
            DB::commit();
            Session::flash('success', "User created successfully!");
            return redirect()->route('user.auth.getLogin');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to create user: ' . $e->getMessage());
            Session::flash('error', "Failed to create user.");
            return redirect()->back();
        }
    }
}
