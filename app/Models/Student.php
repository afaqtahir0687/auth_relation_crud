<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Helpers\AppHelper;


class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'registration_number',
        'dob',
        'gender',
        'fee',
        'language',
        'status',
    ];

    public function getGenderAttribute($value)
    {
        return Arr::get(AppHelper::GENDER, $value);
    }

    public function getLanguageAttribute($value)
    {
        return Arr::get(AppHelper::LANGUAGES, $value);
    }

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