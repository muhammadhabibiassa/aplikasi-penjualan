<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'idItem', 'sellingPrice', 'purchasePrice', 'quantity'
    ];

    protected $casts = [
    	'idItem' => 'integer',
    	'sellingPrice' => 'integer',
    	'purchasePrice' => 'integer',
    	'quantity' => 'integer'
    ];

    public function item()
    {
    	return $this->belongsTo('App\Models\Item', 'idItem');
    }
}
