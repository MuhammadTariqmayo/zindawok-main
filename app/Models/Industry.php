<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;
    protected $fillable = [
    	'name'
    ];

    public function occupation()
    {
    	return $this->hasMany(Occupation::class , 'industry_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'industry_id');
    }
}

