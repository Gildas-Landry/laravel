<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Utils\ErrorManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $supplier = Supplier::all();
        return response()->json($supplier);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'address'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'supplier_picture'=>'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['translate' => ErrorManager::validate()], 400);
            }

            $supplier = Supplier::create([
                'name' => $request->name,
                'address'=>$request->address,
                'phone_number' => $request->phone_number,
                'email'=> $request->email,
                'supplier_picture'=>$request->supplier_picture
            ]);

            return response()->json($supplier);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // $data = array();
        //$data['category_name'] = $request->category_name;
        //$user = DB::table('categories')->where('id', $id)->update($data);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'address'=>'required',
            'phone_number'=>'required|max:9',
            'email'=>'required',
            'supplier_picture'=>'required'
        ]);
        if ($validator->fails()) {
            return $validator->messages();
            return response()->json(['translate' => ErrorManager::validate()], 400);
        }

        $supplier = Supplier::where('id', $id)->firstOrFail();
        $supplier->name = $request->name;
        $supplier->phone_number = $request->phone_number;
        $supplier->address= $request->address;
        $supplier->email=$request->email;
        $supplier->supplier_picture=$request->supplier_picture;
        $supplier->save();
        return response()->json($supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = Supplier::where('id',$id);
        $supplier->delete();
        return response()->noContent();
    }
}
