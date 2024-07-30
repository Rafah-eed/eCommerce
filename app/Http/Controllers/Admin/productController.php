<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Models\Product;
use App\GeneralTraits;

class productController extends Controller
{

	public function show(){
		$products = Product::get();
		$categories = Category::get();
		//dd("$categories");
		return view('Admin.viewProducts', compact('products'),compact('categories'));
	}




	public function add(){
		$categories = Category::get();
		return view('Admin.product', compact('categories'));
	}




	public function edit(Request $request){
		//dd("$request->id ...");
		$exist = Product::where('id', '=', $request->id)->first();
        $existCategory = Category::where('id', '=', $exist->id_category)->first();
        $allCategory= Category::get();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the product does not exist');
		}


		return view('Admin.editProduct', compact('exist','existCategory','allCategory'));
	}




	public function update(Request $request){
		//dd("$request->id ...");
		$exist = Product::where('id', '=', $request->id)->first();
        $categories = Category::get();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the product does not exist');
		}

		$exist->name = $request->name;
        $exist->id_category = $request->id_category;
        $exist->price = $request->price;
		$exist->qty = $request->qty;


		$exist->save();

		$products = Product::get();
		return view('Admin.viewProducts', compact('products','categories'));
	}





	public function delete(Request $request){
		//dd("$request->id ...");
		$exist = Product::where('id', '=', $request->id)->first();
		if(!$exist)
		{
			return redirect()->back()->with('fail', 'the product does not exist');
		}

		$exist->delete();
		//$exist->save();
		return redirect()->back()->with('success', 'the product was successfully deleted');
	}




	public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],

            'price' => ['required', 'numeric', 'max:255'],
			'id_category' => ['required'],
            'qty' => ['required','numeric',  'max:255'],
			'photo' => ['required'],
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

			//return redirect::back()->withErrors($validator)->withInput();
        }

		//dd("store category ..");
		$exist = Product::where('name', $request->name)->first();
		//dd($exist);
		if($exist)
		{
			return redirect()->back()->with('fail', 'the product accually exist in the system');
		}
		$c = new Product();
		$c->name = $request->name;
        $c->price = $request->price;
		$c->id_category = $request->id_category;
		$c->qty = $request->qty;
		$imgename = time().'.'.$request->photo->extension();
		//$request->photo->move(public_path('photos'),$imgename);
		$request->photo->move('photos',$imgename);
		$c->photo = '/photos'."/".$imgename;

		$c->save();
		return redirect()->back()->with('success', 'the product was created');
	}
}
