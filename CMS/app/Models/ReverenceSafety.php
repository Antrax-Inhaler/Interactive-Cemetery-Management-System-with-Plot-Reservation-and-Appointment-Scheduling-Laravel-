<?php

// app/Models/ReverenceSafety.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReverenceSafety extends Model
{
    protected $table = 'reverence_safety'; // Ensure this matches the table name in the database
    protected $fillable = ['description'];
}