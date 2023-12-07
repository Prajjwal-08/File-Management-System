<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\file_Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Aoo\Models\file_Model;


class fileController extends Controller
{
    public function index()
    {
        if (Auth::user()->Is_Admin != 0) {
            $prod = file_Model::all();
            return view("file.index", ['products' => $prod]);
        }
        // return view("file.index");
        // $user_id = Auth::id();
        // echo $user_id;
    }
    public function upload()
    {
        if (Auth::user()->Is_Admin != 0) {
            $users = User::all();
            return view('file.file_upload', compact('users'));
        }
    }
    public function uploaded(Request $request)
    {
        // $user_id = ;
        if (Auth::user()->Is_Admin != 0) {

            if ($request->hasFile('fileupload')) {

                $file = $request->file('fileupload');

                $user_id = Auth::id();
                $file_name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                // $file = $request->getClientOriginalName();
                // $destinationPath = public_path().'/uploads/';
                // $postImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
                // $file->move($destinationPath, $file_name);
                // $path = $file->store('uploads','public');
                $file->storeAs('uploads', $file_name . '--UserId--' . $user_id, 'public');
                $data = $request->validate([
                    // 'user_id' => $user_id,
                    'file_Category' => 'in:Pdf,Word Document,image,video,apk file,json file',
                    'file_description' => 'required|string',
                ]);
                $cat = $request->file_Category;
                $desc = $request->file_description;
                // file_model::create($data);
                // echo $cat;
                // echo $desc;
                // echo $file_name;
                DB::table('file_mgmt_sys')->insert([
                    'user_id' => $user_id,
                    'category_id' => $ext,
                    'filename' => $file_name,
                    'description' => $desc,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                return redirect()->route('index')->with('file Uploaded Sucessfully');
            }
        }
    }
    public function Files(Request $request)
    {
        if (Auth::user()->Is_Admin != 0) {
            dd($request->all(''));
        }
    }
    public function destroy($id)
    {
        if (Auth::user()->Is_Admin != 0) {
            DB::table('file_mgmt_sys')->where(['id' => $id])->delete();

            return redirect(route('index'))->with('success', 'File Deleted Sucessfully');
        }
    }
}
