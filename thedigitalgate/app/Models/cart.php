<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [

        'cart_id',
        'module_Id',
        'aspirant_id',
        'created_date',
        'status'
    ];

    protected $table = 'cart';
    public $timestamps = false;

    use HasFactory;
}
