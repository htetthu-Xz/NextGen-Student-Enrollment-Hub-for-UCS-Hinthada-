<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function Subjects() 
    {
        return $this->hasMany(Subject::class);    
    }

    // public function scopeGetSemesterUsers(Builder $builder, Semester $semester) 
    // {
    //     $builder->
    // }
}
