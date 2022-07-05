<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table="products";

    public function category(){
        return $this->belongsTo(category::class,'category_id');   
    }
     public function  subCategories(){
        return $this->belongsTo(subcategory::class,'subcategory_id');
     }
}
