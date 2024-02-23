<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('cms.setting.index',compact('setting'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login_id' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $setting = Setting::first();

        if (!$setting) {
            Setting::create([
                'login_id' => $request->input('login_id'),
                'password' => Hash::make($request->input('password')),
                'password_text' => $request->input('password'),
            ]);
        } else {
            $setting->update([
                'login_id' => $request->input('login_id'),
                'password' => Hash::make($request->input('password')),
                'password_text' => $request->input('password'),
            ]);
        }

        Session::flash('success', "Update successfully!");
        return redirect()->route('cms.setting.index');
    }
}
