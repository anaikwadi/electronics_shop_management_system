<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public $table = 'vendor';   

    protected $fillable = [
          'name', 'mobile', 'email', 'address', 
    ];
}
