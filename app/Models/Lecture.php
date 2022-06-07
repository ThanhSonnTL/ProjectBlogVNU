<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Department;

class Lecture extends Model
{
    protected $fillable = [
        'lecturer_ID,
        lecturer_name,
        lecturer_gender,
        lecturer_email, 
        department_ID,  
        create_at,
        update_at'
    ];
    public function Departments()
    {
        return $this->hasMany(Department::class, 'foreign_key');
    }
}
