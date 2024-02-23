<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function getLogin()
    {
        return view('cms.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('login_id', 'password');

        if (Auth::guard('cms')->attempt($credentials)) {
            return redirect()->route('cms.user.index');
        } else {
            return redirect()->route('cms.auth-cms.getLogin')->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        Auth::guard('cms')->logout();
        Session::flash('success', "You have been logged out successfully.");
        return redirect()->route('cms.auth-cms.getLogin');
    }
}
