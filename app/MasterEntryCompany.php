<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEntryCompany extends Model
{
    public $table = 'MasterEntryCompany';   

    protected $fillable = [
          'company_name', 'month', 'year', 
    ];
}
