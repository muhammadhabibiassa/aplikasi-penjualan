<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name', 'gender', 'phone', 'email', 'address'
    ];

    protected $casts = [
    	'name' => 'string',
    	'gender' => 'string',
    	'phone' => 'integer',
    	'email' => 'string',
    	'address' => 'string'
    ];
}
