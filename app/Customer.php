<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'Customer';   

    protected $fillable = [
          'name', 'mobile', 'email', 'address', 'bill_number', 'month', 'year', 
    ];
}
