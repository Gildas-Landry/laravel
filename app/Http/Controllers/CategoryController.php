<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Utils\ErrorManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'category_name' => 'required|max:30',
            'description' =>'required'
            ]);
            if ($rules->fails()) {
                return response()->json(['translate' => ErrorManager::validate()], 400);
            }

            $category = Category::create([
                'category_name' => $request->category_name,
                'description' => $request->description
            ]);

            return response()->json($category);
    }

    public function update(Request $request, $id){
        $rules = Validator::make($request->all(), [
            'category_name' => 'required|max:30',
            'description' =>'required'
            ]);

            if ($rules->fails()) {
                return response()->json(['translate' => ErrorManager::validate()], 400);
            }


        $category=Category::where('id',$id)->firstOrfail();
        $category->category_name=$request->category_name;
        $category->description=$request->description;
        $category->save();
        return response()->json($category);
    }

    public function destroy( $id){
        Category::where('id',$id)->delete();
        return response()->noContent();
    }
}
