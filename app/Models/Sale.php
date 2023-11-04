<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    public function products(): BelongsToMany{
        return $this->belongsToMany(Product::class);
    }

    use HasFactory;
    protected $fillable=['sellers_name','customer_name','customer_address'];
}
