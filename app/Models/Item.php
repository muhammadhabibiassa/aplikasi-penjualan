<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
    	'idCategory', 'idBrand', 'name', 'sellingPrice', 'purchasePrice', 'quantity'
    ];

    protected $casts = [
    	'idCategory' => 'integer',
    	'idBrand' => 'integer',
    	'name' => 'string',
    	'sellingPrice' => 'integer',
    	'purchasePrice' => 'integer',
    	'quantity' => 'integer',
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category', 'idCategory');
    }

    public function brand()
    {
    	return $this->belongsTo('App\Brand', 'idBrand');
    }
}
