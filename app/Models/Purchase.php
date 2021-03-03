<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
    	'idSupplier', 'invoiceNumber', 'discount', 'ppn', 'total', 'date', 'status'
    ];

    protected $casts = [
    	'idSupplier' => 'integer',
    	'invoiceNumber' => 'string',
    	'discount' => 'integer',
    	'ppn' => 'integer',
    	'total' => 'integer',
    	'date' => 'datetime',
    	'status' => 'string',
    ];

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier', 'idSupplier');
    }
}
