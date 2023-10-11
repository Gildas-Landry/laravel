<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model
    */
    public function model(array $row)
    {

         return new Product([
            'id' => $row['id'],
            'category_id' =>$row['category_id'],
            'product_name' => $row['product_name'],
            'bulk_quantity_stocked' => $row['bulk_quantity_stocked'],
            'retail_quantity_stocked' => $row['retail_quantity_stocked'],
            'cost_price' => $row['cost_price'],
            'selling_price' => $row['selling_price'],
            'product_image' => $row['product_image'],
        ]);

    }
}
