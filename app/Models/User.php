<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'date_of_birth',
        'phone',
        'location',
        'image',
        'video',
        'salary',
        'about',
        'professional_skills',
        'interpersonal_skills',
        'future_goals',
        'english_level',
        'employment_status',
        'no_of_dependents',
        'cnic',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function careerBackgrounds()
    {
        return $this->hasMany(CareerBackground::class, 'user_id');
    }

    public function personalizedBackgrounds()
    {
        return $this->hasMany(PersonalizedBackground::class, 'user_id');
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class, 'user_id');
    }

    public function bookMarks(){
        return $this->hasMany(BookMark::class,'user_id');
    }

    public function appliedJobs(){
        return $this->belongsToMany(Job::class);
    }

    public function jobHistory(){
        return $this->hasMany(JobHistory::class,'user_id');
    }
    public function userscouts()
    {
        return $this->belongsToMany(Company::class,'company_id');
    }

}
