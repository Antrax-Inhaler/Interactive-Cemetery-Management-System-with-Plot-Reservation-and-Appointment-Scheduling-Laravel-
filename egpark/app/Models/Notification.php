<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'notifications';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'user_id',
        'type',
        'item_id',
        'message',
        'admin_message',
        'is_read',
        'is_read_admin',
    ];

    // Define the attributes that should be cast to native types
    protected $casts = [
        'is_read' => 'boolean',
        'is_read_admin' => 'boolean',  // Added field
    ];

    /**
     * Get the user that owns the notification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include unread notifications for users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', 0);
    }

    /**
     * Scope a query to only include unread notifications for admins.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnreadForAdmin($query)
    {
        return $query->where('is_read_admin', 0);
    }

    /**
     * Get the reservation associated with the notification.
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'item_id')->where('type', 'reservation');
    }

    /**
     * Get the appointment associated with the notification.
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'item_id')->where('type', 'appointment');
    }

    /**
     * Get the transaction associated with the notification.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'item_id')->where('type', 'transaction');
    }
}
