<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntermentService extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_non_senior',
        'price_senior',
        'price_transfer_of_bones'
    ];

    // Add any relationships or additional methods if needed
}
