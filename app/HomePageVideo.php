<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageVideo extends Model
{    
    public $table = 'HomePageVideo';   

    protected $fillable = [
          'name', 'url', 'sequence', 'status', 
    ];
}
