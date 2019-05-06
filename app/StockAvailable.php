<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockAvailable extends Model
{
    public $table = 'StockAvailable';   

    protected $fillable = [
          'vendor_id', 'item_id', 'company_id', 'model_id',  'quantity', 'available_quantity', 
    ];
}
