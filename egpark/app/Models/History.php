<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'item_id', 'action'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'item_id');
    }    
// In History.php model
public function reservation()
{
    return $this->belongsTo(Reservation::class, 'item_id');
}
// In Transaction.php model
public function histories()
{
    return $this->hasMany(History::class, 'item_id')
                ->where('type', 'transaction');
}

}
