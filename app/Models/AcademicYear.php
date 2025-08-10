<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function studentRegistrations()
    {
        return $this->hasMany(StudentRegistration::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'current_academic_year_id');
    }
}
