<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Utils\ErrorManager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sale = Sale::all();
        return response()->json($sale);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sellers_name' => 'required|max:30',
            'customer_name' => 'required',
            'customer_address'=>'required',


            ]);
            if ($validator->fails()) {
                return response()->json(['translate' => ErrorManager::validate()], 400);
            }

            $product = Sale::create([
                'sellers_name' => $request->sellers_name,
                'customer_name'=> $request->customer_name,
                'customer_address' =>$request->customer_address,

            ]);

            return response()->json($product);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'sellers_name' => 'required|max:30',
            'customer_name' => 'required',
            'customer_address'=>'required',

        ]);
        if ($validator->fails()) {
            return $validator->messages();
            return response()->json(['translate' => ErrorManager::validate()], 400);
        }

        $sale = Sale::where('id', $id)->firstOrFail();
        $sale->sellers_name = $request->sellers_name;
        $sale->customer_name = $request->customer_name;
        $sale->customer_address= $request->customer_address;
        $sale->save();
        return response()->json($sale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //DB::table('products')->where('id', $id)->delete();

        Sale::where('id', $id)->delete();
        return response()->noContent();
    }
}
