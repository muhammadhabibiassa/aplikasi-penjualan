<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
    	'idItem', 'invoiceNumber', 'total', 'profit', 'discount', 'ppn'
    ];

    protected $casts = [
    	'idItem' => 'integer',
    	'invoiceNumber' => 'string',
    	'total' => 'integer',
    	'profit' => 'integer',
    	'discount' => 'integer',
    	'ppn' => 'integer'
    ];

    public function sales_detail()
    {
        return $this->hasMany('App\Models\SalesDetail', 'salesId');
    }

    public function item()
    {
    	return $this->belongsTo('App\Models\Item', 'idItem');
    }
}
