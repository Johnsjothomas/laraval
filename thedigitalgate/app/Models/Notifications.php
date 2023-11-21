<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = [
        'notification_text',
        'notifrom',
        'trainer_id',
        'aspirant_id',
        'created_date',
        'status',
    ];

    protected $table = 'notifications';
    public $timestamps = false;

    use HasFactory;
}
