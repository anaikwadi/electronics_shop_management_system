<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatestOffers extends Model
{
    public $table = 'LatestOffers_system';   

    protected $fillable = [
          'item_id', 'actual_price', 'display_price', 'offer_price', 'video_link', 'description', 
    ];
}
