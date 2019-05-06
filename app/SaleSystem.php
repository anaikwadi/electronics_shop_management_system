<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleSystem extends Model
{
    public $table = 'sale_system';   

    protected $fillable = [
          'bill_number', 'item_id', 'customer_id', 'quantity', 'actual_price', 'sale_price', 'percent_gst', 'total', 'payment_method', 'paid_amount', 'balance_amount', 'due_date', 'month', 'year', 'status', 
    ];
}
