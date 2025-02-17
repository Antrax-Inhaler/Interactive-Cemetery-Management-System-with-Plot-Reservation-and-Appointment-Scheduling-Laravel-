<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'facilities';

    // Specify the fields that can be mass-assigned
    protected $fillable = ['facility'];
}
