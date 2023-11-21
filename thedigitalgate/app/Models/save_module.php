<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class save_module extends Model
{
    protected $fillable = [
        'aspirant_id',
        'module_Id',
    ];
    protected $table = 'save_modules';
    public $timestamps = false;
    use HasFactory;
}
