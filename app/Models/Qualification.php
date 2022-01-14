<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
    	'school_name',
    	'school_city',
    	'school_start_date',
    	'school_end_date',
    	'degree',
    	'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
