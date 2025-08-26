<?php

namespace App\Models;

use App\Models\StudentRegistration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentRegistration()
    {
        return $this->belongsTo(StudentRegistration::class);
    }
}
