<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    public $timestamps = false;
        protected $fillable = ['customer_id','comment','comment_date','comment_product_id','rating'];
        protected $primaryKey = 'comment_id';
        protected $table = 'tbl_comment';
}
