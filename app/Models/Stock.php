<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
    	'idItem', 'stockIn', 'stockOut', 'total'
    ];

    protected $casts = [
    	'idItem' => 'integer',
    	'stockIn' => 'integer',
    	'stockOut' => 'integer',
    	'total' => 'integer'
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'idItem');
    }
}
