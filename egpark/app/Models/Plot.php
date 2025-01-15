<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_no',
        'plot_number',
        'lot_owner',
        'owner_address',
        'contact_number',
        'status',
        'occupant_name',
        'occupant_address',
        'gender',
        'age',
        'interment_date',
        'image'
    ];
}
