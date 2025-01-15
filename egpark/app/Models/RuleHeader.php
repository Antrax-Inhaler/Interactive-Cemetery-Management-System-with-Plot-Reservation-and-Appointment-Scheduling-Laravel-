<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleHeader extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'rule_headers';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'title',
        'greetings',
        'description',
        'subdescription',
    ];

    // If you're using timestamps, you can leave this as true
    public $timestamps = true;
}
