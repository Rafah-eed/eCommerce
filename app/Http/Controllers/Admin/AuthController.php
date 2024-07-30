<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\GeneralTraits;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function check(Request $request){

		/*$credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

		if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return view('Admin.1', compact('exist'));
        }
 
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');*/


		$exist = User::where('name', '=', $request->name)->first();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'you are not in the system');
		}
		/*$hashed = Hash::make($request->password);

        if ($exist->password == $hashed && $exist->admin == $request->admin){
            return view('Admin.1', compact('exist'));
        }
		else if($exist->password == $hashed && $exist->employee == $request->employee){
			return view('employee.1', compact('exist'));
            
        }
		
		else {
			return redirect()->back()->with('fail', 'the password is incorret');
		}*/


		if(Hash::check($request->password,  $exist->password)){

			if ($request->admin=='1'){
				Auth::guard('employee')->logout();
				$credentials = $request->only('name', 'password');
				Auth::guard('admin')->attempt($credentials);
				return view('Admin.1', compact('exist'));
			
			if($exist->admin==0){
				return redirect()->back()->with('fail', 'you are not permitted');
			}}


		}





		if ($request->employee=='1'){
			Auth::guard('admin')->logout();
			$credentials = $request->only('name', 'password');
			Auth::guard('employee')->attempt($credentials);
			return view('employee.1', compact('exist'));
		
		if($exist->employee==0){
			return redirect()->back()->with('fail', 'you are not permitted');
		}}




	}

}
	

