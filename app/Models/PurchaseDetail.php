<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'idItem', 'ordered', 'accepted'
    ];

    protected $casts = [
    	'idItem' => 'integer',
    	'ordered' => 'integer',
    	'accepted' => 'integer'
    ];

    public function item()
    {
    	return $this->belongsTo('App\Item', 'idItem');
    }
}
