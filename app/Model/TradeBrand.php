<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TradeBrand extends Model
{
    protected $table='trade_brands';
    protected $fillable=['brand_name_ar','brand_name_en','logo'];
}
