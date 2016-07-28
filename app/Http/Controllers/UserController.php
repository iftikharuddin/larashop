<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class UserController extends Controller
{
    public function getSignup(){
		return view('user.signup');
	}
	
	public function postSignup(Request $request){
		\Validator::make($request->all(), [
			'email' => 'email|required|uique:users',
			'password' => 'required|min:4'
		]);
		
		$user = new User([
			'email' => $request->email,
			'password' => bcrypt($request->password)
		]);
		
		$user->save();
		
		return redirect('/');
	}
}
