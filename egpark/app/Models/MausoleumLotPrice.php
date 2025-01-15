<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MausoleumLotPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'size',
        'downpayment',
        'installment',
        'discount_for_cash_basis'
    ];

    // Add any relationships or additional methods if needed
}
