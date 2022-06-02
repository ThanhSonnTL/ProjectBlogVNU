<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public function getAllCategories(){
        $users = DB::tables('categories')->get();
    }
}
