<?php

namespace App\Models;

use App\Models\User;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Semester() 
    {
        return $this->belongsTo(Semester::class);    
    }

    public function User() 
    {
        return $this->belongsTo(User::class);    
    }
}
