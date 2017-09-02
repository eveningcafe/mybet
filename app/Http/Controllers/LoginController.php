<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use Hash;
use App\User;
use Session;
class LoginController extends Controller
{
    //
     public function check(Request $request){
     	$users = User::all();
     	foreach ($users as $user) {
     		if(($user->user_name==$request->username)&&(Hash::check($request->password, $user->password)))
     		{
     			if($user->level=='1')
     			{
     				// $ip_address=$_SERVER['REMOTE_ADDR'];
     				// Session::put('admin',$ip_address);
                         
     				return redirect()->route('admin');
     			}elseif($user->level=='2'){
                         
                         $logdata = array(
                         "user_name"=> $user->user_name,
                         "level"=> 2
                         );

                         Session::put(request()->ip(),'1');
                         // Session::flash($request->ip(), array_merge((array)Session::get($request->ip()), array($logdata)));

                         $url='/'.$user->user_name.'/home';
     				return redirect($url);;
     			}    			
     		}
     	}
     	dd('no userfound');
	}
}