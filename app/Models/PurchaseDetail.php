<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'idItem', 'purchaseId', 'ordered', 'accepted'
    ];

    protected $casts = [
        'idItem' => 'integer',
        'purchaseId' => 'integer',
    	'ordered' => 'integer',
    	'accepted' => 'integer'
    ];

    public function item()
    {
    	return $this->belongsTo('App\Models\Item', 'idItem');
    }
}
