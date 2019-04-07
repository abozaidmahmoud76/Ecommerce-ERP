<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table='settings';
    protected $fillable=['sitename_ar','sitename_en','email',
                         'description','keywords','main_lang','status','message_maintenance','logo','icon'
        ];
}
