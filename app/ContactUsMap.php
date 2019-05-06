<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsMap extends Model
{
    public $table = 'ContactUsMap';   

    protected $fillable = [
          'iframe', 
    ];
}
