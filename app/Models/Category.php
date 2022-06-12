<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        //Người dùng chỉ có thể điền thông tin các trường sau
        'category_ID,
        category_title,
        category_parent,'
    ];
}
