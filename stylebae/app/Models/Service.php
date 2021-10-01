<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'product_id',
        'service_name_hin',
        'service_name_hin',
        'service_slug_en',
        'service_slug_hin',
        'price',
        'discount',
        
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
    public function salon(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
