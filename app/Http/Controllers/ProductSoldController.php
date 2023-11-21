<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSold;
use App\Models\ProductSupplied;
use App\Utils\ErrorManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductSoldController extends Controller
{
    public function index()
    {
        $productsold = ProductSold::all();
        return response()->json($productsold);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bulk_selling_price' => 'required',
            'retail_selling_price' =>'required',
            'quantity_sold' => 'required',
            'date_sold' =>'required',
            'product_id'=>'required',
            'sale_id' => 'required'

            ]);
            if ($validator->fails()) {
                return response()->json(['translate' => ErrorManager::validate()], 400);
            }
            $product= Product::where('id',$request->product_id)->firstOrFail();
            $product->retail_quantity_stocked=$product->retail_quantity_stocked-$request->quantity_sold;
            $product->save();


            $productsold = ProductSold::create([
                'bulk_selling_price' =>$request->bulk_selling_price,
                'retail_selling_price' =>$request->retail_selling_price,
                'quantity_sold'=>$request->quantity_sold,
                'date_sold'=>$request->date_sold,
                'product_id' =>$request->product_id,
                'sale_id' =>$request->sale_id,
            ]);

            return response()->json($productsold);
    }

    public function purchase($pid){

    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:30',

        ]);
        if ($validator->fails()) {
            return $validator->messages();
            return response()->json(['translate' => ErrorManager::validate()], 400);
        }

        $product = ProductSold::where('id', $id)->firstOrFail();
        $product->product_name = $request->product_name;
        $product->product_image = $request->product_image;
        $product->bulk_quantity_stocked=$request->bulk_quantity_stocked;
        $product->retail_quantity_stocked=$request->retail_quantity_stocked;
        $product->cost_price =$request->cost_price;
        $product->selling_price= $request->selling_price;
        $product->save();
        return response()->json($product);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ProductSold::where('id', $id)->delete();
        return response()->noContent();
    }

    public function monthlyEarnings(){
        $pss=ProductSold::all();
        $somme=0;
        foreach($pss as $ps){
            $total=$ps->quantity_sold*$ps->retail_selling_price;
            $somme+=$total;
        }
        return $somme;
    }

    public function profit(){
        $s=0;
        $productsupplied=ProductSupplied::all();
        $productsold=ProductSold::all();
        
        foreach($productsold as $ps){
            foreach($productsupplied as $psu){
                $profit= $ps->retail_selling_price-$psu->bulk_price;
                $s=$s+$profit;
            }
        }
        return $s;
    }

}
