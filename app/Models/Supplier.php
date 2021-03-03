<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name', 'phone', 'address', 'state', 'city', 'postalCode'
    ];

    protected $casts = [
    	'name' => 'string',
    	'phone' => 'integer',
    	'address' => 'string',
    	'state' => 'string',
    	'city' => 'string',
    	'postalCode' => 'integer',
    ];
}
