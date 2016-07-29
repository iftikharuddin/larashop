<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;
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
		if(Session::has('oldUrl')){
				$oldUrl = Session::get('oldUrl');
				Session::forget('oldUrl');
				return redirect()->to($oldUrl);
		}
		return redirect('/');
	}
	
	public function getSignin(){
		return view('user.signin');
	}
	
	public function postSignin(Request $request){
		\Validator::make($request->all(), [
			'email' => 'email|required|uique:users',
			'password' => 'required|min:4'
		]);
		if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
			if(Session::has('oldUrl')){
				$oldUrl = Session::get('oldUrl');
				Session::forget('oldUrl');
				return redirect()->to($oldUrl);
			}
			return redirect('user/profile');
		}
		return redirect()->back();		
	}
	
	public function getProfile(){
		return view('user.profile');
	}
	
	public function getLogout(){
		Auth::logout();
		return redirect('user/signin');		
	}
}
