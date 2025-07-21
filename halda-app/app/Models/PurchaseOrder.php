<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'date',
        'supplier_id',
        'notes',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
