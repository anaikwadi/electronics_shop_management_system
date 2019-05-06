<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterEntryModel extends Model
{
    public $table = 'MasterEntryModel';   

    protected $fillable = [
          'model_name',  'month', 'year', 
    ];
}
