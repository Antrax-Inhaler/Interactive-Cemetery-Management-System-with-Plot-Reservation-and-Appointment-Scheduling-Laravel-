<?php

// app/Models/FlowersDecoration.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowersDecoration extends Model
{
    protected $table = 'flowers_decoration'; // Ensure this matches the table name in the database
    protected $fillable = ['description'];
}