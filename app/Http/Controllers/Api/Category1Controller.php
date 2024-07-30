<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\GeneralTraits;
use Illuminate\Http\JsonResponse as HttpJsonResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class Category1Controller extends Controller
{

	public function show(){
		//dd(Hash::make('12345678'));
		$categories = Category::get();

        if ($categories->isEmpty()){
            return response()->json([
                'message' => 'there are no category',
                'date' => $categories
            ],200);
        }

		return response()->json([
            'message' => 'success',
            'date' => $categories
        ],200);
	}





	public function update(Request $request){
		//dd("$request->id ...");
		$exist = Category::where('id', '=', $request->id)->first();
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
            return response()->json([
                'message' => 'The cateegory is not found',
            ],404);
		}

		$exist->delete();

        return response()->json([
            'message' => 'The cateegory deleted successfully',
        ],200);
	}


	public function store(Request $request){
		$validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required','string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Either name or description is wrong',

            ],422);


        }

		$exist = Category::where('name', $request->name)->first();
		//dd($exist);
		if($exist)
		{
            return response()->json([
                'message' => 'The cateegory already exists',
                'date' => $exist
            ],200);
		}
		$c = new Category();
		$c->name = $request->name;
		$c->description = $request->description;
		$c->save();
        $r=$c->id;
        return response()->json([
            'message' => 'there are was created',
            'date' => $r
        ],200);
	}
}
