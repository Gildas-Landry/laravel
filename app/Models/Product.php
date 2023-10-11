<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    public function sales(): BelongsToMany{
        return $this->belongsToMany(Sale::class);
    }

    public function suppliers(): BelongsToMany{
        return $this->belongsToMany(Supplier::class);
    }

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }



    use HasFactory;
    protected $hidden=['created_at','updated_at'];
    protected $fillable=['product_name',"bulk_quantity_stocked",'cost_price','product_image','retail_quantity_stocked',"selling_price",'category_id'];
}
