<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Product;
use App\Utils\ErrorManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:30',
            'cost_price' => 'required',
            'product_image'=>'required|file',
            "bulk_quantity_stocked" => 'required|integer',
            'retail_quantity_stocked' =>'required',
            "selling_price" => 'required',
            'category_id'=>'required'

            ]);
            if ($validator->fails()) {
                return response()->json(['translate' => ErrorManager::validate()], 400);
            }

            // if ($file = $request->file('product_image')) {
            //     $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            //     $path = 'public/image';

            //     /**
            //      * Upload an image to Storage
            //      */
            //     $file->storeAs($path, $fileName);
            //     $validator['product_image']=$fileName;

            // }

            $product = Product::create([
                'product_image' => $request->product_image,
                'product_name' => $request->product_name,
                'bulk_quantity_stocked' =>$request->bulk_quantity_stocked,
                'retail_quantity_stocked' =>$request->retail_quantity_stocked,
                'cost_price' => $request->cost_price,
                'selling_price' => $request->selling_price,
                'category_id' => $request->category_id
            ]);

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
       // $data = array();
        //$data['product_name'] = $request->category_name;
        //$user = DB::table('products')->where('id', $id)->update($data);

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:30',
            //'cost_price' => 'required',
            //'product_image'=>'required',
            //"bulk_quantity_stocked" => 'required',
            //'retail_quantity_stocked' =>'required',
            //"selling_price" => 'required',
            //'category_id'=>'required'

        ]);
        if ($validator->fails()) {
            return $validator->messages();
            return response()->json(['translate' => ErrorManager::validate()], 400);
        }

        $product = Product::where('id', $id)->firstOrFail();
        $product->product_name = $request->product_name;
        $product->product_image = $request->product_image;
        $product->bulk_quantity_stocked=$request->bulk_quantity_stocked;
        $product->retail_quantity_stocked=$request->retail_quantity_stocked;
        $product->cost_price =$request->cost_price;
        $product->selling_price= $request->selling_price;
        //$product->category_id=$request->category_id;
        $product->save();
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //DB::table('products')->where('id', $id)->delete();

        Product::where('id', $id)->delete();
        return response()->noContent();
    }

    public function importExcelCSV(Request $request)
    {
         $validator = Validator::make($request->all(),[
            'file' => 'required|file|mimes:xls,xlsx,csv'
         ]);
         if($validator->fails()){
            return $validator->messages();
            //return response()->json(['translate' => ErrorManager::validate()], 400);
         }

        Excel::import(new ProductImport,$request->file('file'));

        return "file imported successfully";
        //return redirect('excel-csv-file')->with('status', 'The file has been excel/csv imported to database in Laravel 10');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'products.xls');
        dd('succesful');
    }

    public function exportCsv()
    {
        return Excel::download(new ProductExport, 'products.csv');
    }

    public function imageUpload(Request $request){
        $request->validate(['image'=>'required|image|mimes:jpg,png,jgeg|max:2048']);

    }
}
