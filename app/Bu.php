<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    //
    protected $table = 'bu';

    protected $fillable = [
        'bu_name',
        'bu_price',
        'bu_rent',
        'bu_square',
        'bu_type',
        'bu_small_des',
        'bu_meta',
        'bu_langtuide',
        'bu_latitude',
        'bu_large_des',
        'bu_status',
        'user_id',
        'bu_rooms',
        'bu_place',
        'image',
    ];
}
