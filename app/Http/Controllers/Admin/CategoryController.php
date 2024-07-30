<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\GeneralTraits;


class CategoryController extends Controller
{

	public function show(){
		//dd(Hash::make('12345678'));
		$categories = Category::get();
		//dd("$categories");
		return view('Admin.viewCategories', compact('categories'));
	}




	public function add(){
		return view('Admin.category');
	}




	public function edit(Request $request){

		//dd("$request->id ...");
		$exist = Category::where('id', '=', $request->id)->first();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the category does not exist');
		}


		return view('Admin.editCategory', compact('exist'));
	}




	public function update(Request $request){
		//dd("$request->id ...");
		$exist = Category::where('id', '=', $request->id)->first();


        if(Gate::denies('update-category',$exist)){
            dd("not okay authorization");
        }
        else
        {
            dd(" okay authorization");
        }








        if(!$exist)
		{
			return redirect()->back()->with('fail', 'the category does not exist');
		}

		$exist->name = $request->name;
		$exist->description = $request->description;
		$exist->save();

		$categories = Category::get();
		return view('Admin.viewCategories', compact('categories'));
	}





	public function delete(Request $request){
		//dd("$request->id ...");
		$exist = Category::where('id', '=', $request->id)->first();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the category does not exist');
		}

		$exist->delete();
		//$exist->save();
		return redirect()->back()->with('success', 'the category was successfully deleted');
	}




	public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('fail', 'validation error ...');

			//return redirect::back()->withErrors($validator)->withInput();
        }

		//dd("store category ..");
		$exist = Category::where('name', $request->name)->first();
		//dd($exist);
		if($exist)
		{
			return redirect()->back()->with('fail', 'the category accually exist in the system');
		}
		$c = new Category();
		$c->name = $request->name;
		$c->description = $request->description;
		$c->save();
		return redirect()->back()->with('success', 'the category was created');
	}
}
