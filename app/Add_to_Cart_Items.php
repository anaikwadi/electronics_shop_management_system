<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_to_Cart_Items extends Model
{
    public $table = 'Add_to_Cart_Items';   

    protected $fillable = [
          'item_id', 'user_id', 'actual_price', 'offer_price', 'quantity', 'total', 'month', 'year', 'status', 
    ];
}
