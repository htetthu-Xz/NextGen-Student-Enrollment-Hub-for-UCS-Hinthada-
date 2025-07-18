<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Grading;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'stop',
        'image',
        "uni_id_no",
        'uuid',
        'transfer',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function studentRegistrations()
    {
        return $this->hasMany(StudentRegistration::class, 'user_id');
    }

    public function CurrentUserAcademicYear()
    {
        $registration = $this->studentRegistrations()
            ->where('status', 'confirm')
            ->latest()
            ->first();

        return $registration && $registration->academicYear
            ? $registration->academicYear->name
            : null;
    }

    public function CurrentUserAcademicInfo()
    {
        return $this->studentRegistrations()
            ->where('status', 'confirm')
            ->latest()
            ->first();
    }

    public function Grading()
    {
        return $this->hasOne(Grading::class);
    }

    public function Subject()
    {
        return $this->hasMany(Subject::class);
    }
}
