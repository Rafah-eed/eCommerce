<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\GeneralTraits;

use function Ramsey\Uuid\v1;

class CustomerController extends Controller
{

	public function show(){
		$customers = Customer::get();
		//dd("$categories");
		return view('Admin.viewCustomers', compact('customers'));
	}




	public function add(){
		return view('Admin.customer');
	}




	public function edit(Request $request){
		//dd("$request->id ...");
		$exist = Customer::where('id', '=', $request->id)->first();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the customer does not exist');
		}


		return view('Admin.editCustomer', compact('exist'));
	}




	public function update(Request $request){
		//dd("$request->id ...");
		$exist = Customer::where('id', '=', $request->id)->first();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the customer does not exist');
		}

		$exist->f_name = $request->f_name;
		$exist->l_name = $request->l_name;
		$exist->sex = $request->sex;
		$exist->date_of_birth = $request->date_of_birth;
		$exist->address = $request->address;
		$exist->save();

		$customers = Customer::get();
		return view('Admin.viewCustomers', compact('customers'));
	}





	public function delete(Request $request){
		//dd("$request->id ...");
		$exist = Customer::where('id', '=', $request->id)->first();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the customer does not exist');
		}

		$exist->delete();
		//$exist->save();
		return redirect()->back()->with('success', 'the customer was successfully deleted');
	}




	public function store(Request $request){

		$validator = Validator::make($request->all(), [
            'f_name' => ['required', 'string', 'max:255'],
			'l_name' => ['required', 'string', 'max:255'],
            'address' => ['required','string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('fail', 'validation error ...');

			//return redirect::back()->withErrors($validator)->withInput();
        }

		//dd("store category ..");
		$exist = Customer::where('f_name', $request->f_name AND 'l_name', $request->l_name AND 'date_of_birth', $request->date_of_birth)->first();
		//dd($exist);
		if($exist)
		{
			return redirect()->back()->with('fail', 'the customer actually exist in the system');
		}
		$c = new Customer();
		$c->f_name = $request->f_name;
		$c->l_name = $request->l_name;
		$c->sex = $request->sex;
		$c->date_of_birth = $request->date_of_birth;
		$c->address = $request->address;
		$c->save();
		return redirect()->back()->with('success', 'the customer was created');
	}
}
