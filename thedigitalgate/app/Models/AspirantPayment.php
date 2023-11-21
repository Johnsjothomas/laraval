<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspirantPayment extends Model
{
    protected $fillable = [
        'aspirant_id',
        'module_Id',
        'status',
        'payment_date',
        'razorpay_payment_id',
        'reason',
        'description'
    ];
    protected $table = 'aspirant_payment';
    public $timestamps = false;
    use HasFactory;
}
