<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Category;

class Post extends Model
{
    protected $fillable = [
        'post_ID,
        post_title,
        post_decs,
        post_content,
        post_imgURL,
        caterory_ID'
    ];
    public function Categories()
    {
        return $this->hasMany(Category::class, 'foreign_key');
    }
}