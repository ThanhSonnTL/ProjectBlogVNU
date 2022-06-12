<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_ID,
        department_name,
        department_desc,
        department_imgURL,
        create_at,
        update_at'
    ];
    
}
