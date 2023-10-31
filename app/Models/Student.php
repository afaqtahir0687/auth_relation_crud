<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);

    }

    
    public function results()
    {
        return $this->hasMany(Result::class);
    }

}