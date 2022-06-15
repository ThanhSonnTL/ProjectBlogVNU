<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\departments;

class Lecturer extends Model
{
    protected $fillable = [
        'lecturer_ID,
        lecturer_Name,
        lecturer_gender,
        lecturer_email,
        lecturer_imgURL,
        department_ID,
        created_at,
        updated_at'
    ];
    public function departments()
    {
        return $this->hasMany(departments::class,'foreign_key');
    }
}