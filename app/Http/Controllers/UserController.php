<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index()
    {
        return view('User.index');

    }

    public function store(Request $request)
    {
        // $input = Input::all();

        $rules = [
            "name" => "required",
            "email" => "required",
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ];

        $messages = [
            'password_confirmation.same' => 'Confirm Password & Password should be same',
        ];
        $request->validate($rules, $messages);
        // $data = $request->validate([

        //    'password' => 'required|confirmed|min:6',
        //    'confirmed' => 'required|min:6|same:password',
        // ]);

        DB::table('users')->insert([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => NOW(),
            'updated_at' => NOW(),

        ]);
        // $productId = DB::getPdo()->lastInsertId();
        //DB::table('file_mgmt_sys')->insert($data);
        //$newProd = User::create($data);

        return redirect()->route('index');
    }
    public function login()
    {

            return view("User.login");

    }
    public function logincheck(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials) or Auth::user()->Is_Admin == 0) {
            return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
        }

        // Authentication successful, store the user ID in the session
        session(['user_id' => Auth::user()->id]);

        return redirect()->route('index');
    }

    public function logout()
    {
        if (Auth::user()->Is_Admin != 0) {
            Auth::logout();
        }
        return redirect('/');
    }
    // public function loggedout(Request $request)
    // {
    //     $this->guard()->logout();
    //     $request->session()->invalidate();
    //     return redirect('/');
    // }
    public function destroy($id)
    {
        // $user=;'
        if (Auth::user()->Is_Admin != 0) {
            DB::table('users')->where(['id' => $id])->delete();
            DB::table('file_mgmt_sys')->where(['user_id' => $id])->delete();
        }
        return redirect(route('index'))->with('success', 'User Deleted Sucessfully');
    }
    public function forgot()
    {
        if (Auth::user()->Is_Admin != 0) {
            return view("User.update");
        } else {
            return redirect()->back()->with('success', 'Sorry, You can`t access this form');
        }
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
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
