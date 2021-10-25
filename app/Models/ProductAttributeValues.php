<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValues extends Model
{
    use HasFactory;
    public $guarded=[];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function attribute(){
        return $this->belongsTo(ProductAttribute::class,'product_attribute_id');
    }

   
}
