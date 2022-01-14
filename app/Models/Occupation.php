<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    protected $fillable = [
    	'name',
    	'parent_id',
    	'industry_id'
    ];

    public function children()
	{
		return $this->hasMany(Occupation::class, 'parent_id');
	}
	
	public function parent()
	{
		return $this->belongsTo(Occupation::class, 'parent_id');
	}

	public function industry()
	{
		return $this->belongsTo(Industry::class , 'industry_id');
	}

	public function jobs()
    {
        return $this->hasMany(Job::class, 'occupation_id');
    }

    public function jobsub()
    {
        return $this->hasMany(Job::class, 'sub_occupation_id');
    }
}
