<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoutMailPackage extends Model
{
    use HasFactory;
    protected $fillable = [
       'name',
       'price',
       'message_limit',
       'image',
    ];
}
