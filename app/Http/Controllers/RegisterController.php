<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Hash;
use App\User;
class RegisterController extends Controller
{
    //
     public function show()
     {
          $isSuccess='false';
          return view('use.guess.form-register')->with('isSuccess',$isSuccess);
     }
     public function check(Request $request){
          $this->validate($request,[
               'user_name' => 'required|min:4|max:35|unique:users',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:3|max:20',
               'confirm_password' => 'required|min:3|max:20|same:password',
          ],[
               'user_name.required' => ' The user name field is required.',
               'username.min' => ' The user name must be at least 4 characters.',
               'username.max' => ' The user name may not be greater than 35 characters.',
          ]);
          $user = new User;
          $user->user_name=$request->user_name;
          $user->email=$request->email;
          $user->password= Hash::make($request->password);
          $user->level=2;
          $user->save(); 
          $isSuccess='true';
          return view('use.guess.form-register')->with('isSuccess',$isSuccess);
	}
}