<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        public $timestamps = false;
        protected $fillable = ['category_id','product_name','product_desc','product_content','product_price','product_image','product_status'];
        protected $primaryKey = 'id';
        protected $table = 'tbl_product';
    
}
