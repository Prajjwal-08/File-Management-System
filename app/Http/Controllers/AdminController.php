<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\File_model;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
    public function users()
    {
        $prod = User::all()->where('Is_Admin','',1);
        // $prod;
        return view("admin.users", ['products' => $prod]);
    }
    // also include where clause in this
    public function files()
    {
        $prod = File_model::all()->where('Is_Admin','',0);
        return view("admin.files", ['products' => $prod]);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials) || Auth::user()->Is_Admin != 0 ) {
            // echo 'hoii';
            // exit;
            return redirect()->route('AdminLogin')->with('error', 'Invalid credentials. Please try again.');
        }

        // Authentication successful, store the user ID in the session
        session(['user_id' => Auth::user()->id]);

        return redirect()->route('Dashboard');
    }
    public function destroy($id)
    {
        DB::table('file_mgmt_sys')->where(['id' => $id])->delete();

        return redirect(route('index'))->with('success', 'File Deleted Sucessfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login')->with('Success','You are Logged Out of this Session');
    }
    public function showUpdatePasswordForm()
    {
        if(Auth::user()->Is_Admin != 1)
        {return view('admin/update');}
    }

    public function updatePassword(Request $request , $id)
    {
               $rules = [
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ];

        $messages = [
            'confirm_password.same' => 'Confirm Password & Password should be same',
        ];
        $request->validate($rules, $messages);
        DB::table('users')->where(['id' => $id])->update([
            'password' => Hash::make($request->password),
            'updated_at' => NOW(),
        ]);

        return redirect(route('AdminLogin'))->with('success', 'Password updated successfully.');
    }

}
