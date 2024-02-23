<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('cms.user.index', compact('users'));
    }

    public function store()
    {
        return view('cms.user.create');
    }

    public function create(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $create = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'password_text' => $request->input('password'),
                'status' => $request->input('status'),
            ];

            $user = User::create($create);
            DB::commit();
            Session::flash('success', "User created successfully!");
            return redirect()->route('cms.user.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to create user: ' . $e->getMessage());
            Session::flash('error', "Failed to create user.");
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $user = User::destroy($id);
            DB::commit();
            return response()->json();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to delete user: ' . $e->getMessage());
            return response()->json();
        }
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('cms.user.edit',compact('user'));
    }

    public function update(UserRequest $request, $id){
        DB::beginTransaction();
        try {
            $update = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'password_text' => $request->input('password'),
                'status' => $request->input('status'),
            ];

            $user = User::find($id)->update($update);
            DB::commit();
            Session::flash('success', "User update successfully!");
            return redirect()->route('cms.user.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to create user: ' . $e->getMessage());
            Session::flash('error', "Failed to update user.");
            return redirect()->back();
        }
    }
}
