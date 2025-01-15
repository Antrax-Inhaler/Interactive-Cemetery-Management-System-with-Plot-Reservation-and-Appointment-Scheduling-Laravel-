<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawnLotPrice extends Model
{
    use HasFactory;
    protected $table = 'lawn_lot_prices';
    protected $fillable = [
        'price',
        'size',
        'downpayment',
        'installment',
        'discount_for_cash_basis'
    ];

    // Add any relationships or additional methods if needed
}
