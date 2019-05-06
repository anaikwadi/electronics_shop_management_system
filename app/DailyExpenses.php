<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyExpenses extends Model
{
    public $table = 'DailyExpenses';   

    protected $fillable = [
          'name', 'expense_amount', 'month', 'year', 
    ];
}
