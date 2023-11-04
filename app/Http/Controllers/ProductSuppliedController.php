<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSupplied;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rules\Exists;

class ProductSuppliedController extends Controller
{
    public function allProductSupplied(){
        $prosup= ProductSupplied::all();
        return response()->json($prosup);
    }
    public function delivery(Supplier $supplier, Product $product){
        if(Arr::Exists($product,'id')){
           // $product->quantity
        }
    }
    public function destroy($id)
    {
        ProductSupplied::where('id', $id)->delete();
        return response()->noContent();
    }
}
