<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversationasptran extends Model
{
    protected $fillable = [
        'trainer_id',
        'module_id',
        'aspirant_id',
        'chats',
        'mesgfrom',
        'created_date',
    ];

    protected $table = 'conversationasptran';
    public $timestamps = false;

    use HasFactory;
}
