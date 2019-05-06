<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatestOfferImagesAttachment extends Model
{
    public $table = 'LatestOfferImagesAttachment';   

    protected $fillable = [
          'purchase_id', 'latest_offer_id', 'file_name', 'file_size', 'file_type', 'file_path_db', 'file_path', 
    ];
}
