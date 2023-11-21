<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Contact extends Model
{
    //

    protected $fillable = ['name','phone','email','message','service'];
    
  
  

}
