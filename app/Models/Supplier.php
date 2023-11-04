<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supplier extends Model
{
    public function products(): BelongsToMany{
        return $this->belongsToMany(Product::class);

    }
    use HasFactory;
    protected $fillable=['name','address','phone_number','email','supplier_picture'];
    protected $hidden=['updated_at','created_at'];

}
