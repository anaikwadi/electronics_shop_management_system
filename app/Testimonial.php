<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public $table = 'Testimonial';   

    protected $fillable = [
          'name', 'company_name', 'designation', 'quote', 'image_path', 'user_id', 
    ];
}
