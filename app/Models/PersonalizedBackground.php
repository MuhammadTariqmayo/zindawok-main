<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalizedBackground extends Model
{
    use HasFactory;
    protected $fillable = [
    	'qualification',
    	'institution',
    	'start_date',
    	'end_date',
    	'institution_address',
    	'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
