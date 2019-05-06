<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    public $table = 'AboutUs';   

    protected $fillable = [
          'title', 'description', 'type', 'fa_icon', 'bg_color', 
    ];
}
