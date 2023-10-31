<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id'; 

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    
}
