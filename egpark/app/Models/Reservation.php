<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Assuming each reservation is associated with a user
        'facilities', // Store as JSON or another format
        'services', // Store as JSON or another format
        'date',
        'time',
        'status',
    ];

    // Example of relationships, adjust based on your needs
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function histories()
    {
        return $this->hasMany(History::class, 'item_id');
    }

}
