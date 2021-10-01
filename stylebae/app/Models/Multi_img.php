<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multi_img extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function salon(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
