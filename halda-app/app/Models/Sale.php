<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_code',
        'customer_name',
        'sale_date',
        'status',
        'total_amount',
        'notes',
    ];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
