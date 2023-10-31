<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
   
    protected $primaryKey = 'id';

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'id');
    }

    
    public function subject()
    {
        return $this->hasMany(Subject::class, 'id');
    }
 
}
