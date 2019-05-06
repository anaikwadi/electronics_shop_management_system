<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsEnquiries extends Model
{
    public $table = 'ContactUsEnquiries';   

    protected $fillable = [
          'name', 'mobile', 'email', 'enquiry_query', 
    ];
}
