<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'company_id',
        'industry_id',
    	'title',
    	'shift_id',
        'occupation_id',
        'sub_occupation_id',
    	'welcome_bonus',
    	'start_salary',
        'end_salary',
    	'posted_at',
    	'expired_at',
    	'image',
    	'video',
    	'about',
        'type'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'occupation_id');
    }

    public function suboccupation()
    {
        return $this->belongsTo(Occupation::class, 'sub_occupation_id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'job_user','job_id','user_id');
    }

}
