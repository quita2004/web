<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;

use App\User;

class UserController extends Controller
{
    //
	

	public function getLogin(){
		return view('login');
	}

	public function postLogin(Request $request){
		$this->validate($request,[
			'username'=>'required',
			'password'=>'required'
		],[
			'username.required'=>'Bạn chưa nhập tên đăng nhập',
			'password.required'=>'Bạn chưa nhập mật khẩu',

		]);
		if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
			return redirect('user/myticket/all');
		} else{
			return redirect('login')->with('thongbao', 'Tên đăng nhập hoặc mật khẩu không đúng');
		}
	}

	public function getLogout(){
		Auth::logout();
		return redirect('login');
	}

}
