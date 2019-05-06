<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public $table = 'purchase_system';   

    protected $fillable = [
          'bill_number', 'vendor_id', 'company_name', 'model_name', 'hsn', 'quantity', 'unit_price', 'gst', 'percent_gst', 'sgst', 'cgst', 'total', 'month', 'year', 
    ];
}
