<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    public $table = 'Quotation_system';   

    protected $fillable = [
          'bill_number', 'item_id', 'customer_id', 'quantity', 'actual_price', 'sale_price', 'percent_gst', 'total', 'month', 'year', 'status', 
    ];
}
