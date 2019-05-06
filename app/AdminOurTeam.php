<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminOurTeam extends Model
{
    public $table = 'AdminOurTeam';   

    protected $fillable = [
          'name', 'mobile', 'email', 'facebook', 'designation', 'profile_image'
    ];
}
