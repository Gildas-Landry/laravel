<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return Product::all();
    }

    public function headings():array{
        return ['id','category_id','product_name','bulk_quantity_stocked',"retail_quantity_stocked","cost_price","selling_price","product_image"];
    }
}
