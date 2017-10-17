<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin()
    {
    	if(!Auth::check()){
    	return view('admin.modules.login.login');
    	}else{
    		return redirect('sk_admin'); 
    	}
    }
    public function postLogin(LoginRequest $request)
    {
    	$array = [
    		'username' => $request->txtUsername, 
    		'password' => $request->txtPass, 
    		];
    	 if (Auth::attempt($array)) {
            // Authentication passed...
            return redirect('sk_admin');
        }else{
        	return redirect()->back()->with(['flash_level' => 'bg-danger','flash_mesage' => __('auth.failed') ]);
        }
    }
    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('getLogin');
    }
}
