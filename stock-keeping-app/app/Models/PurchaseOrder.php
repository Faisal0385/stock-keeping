<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'order_date',
        'status',
        'total_amount',
        'notes',
    ];

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }
}
