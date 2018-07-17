<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Auth;
class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function profile(){
    	return view('profile');
    }

    public function update(Request $request){
    	$request->validate([
    		'name' => 'required|string|max:255',
            'email' => [
            	'required',
            	'string',
            	'email',
            	'max:255',
            	Rule::unique('users')->ignore(Auth::user()->id),
        	],
            'password' => 'nullable|string|min:6|confirmed',
    	]);
    	$user = Auth::user();
    	if($request->password != null){
    		$user->password = bcrypt($request->password);
    	}
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->save();
    	return redirect()->route('home')->with('message', 'Профиль успешо изменен');

    }

}

