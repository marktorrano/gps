<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
    //

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'status', 'user_id'

    ];

    public function users()
    {

        return $this->belongsTo('App\Models\User');

    }

    public function items()
    {

        return $this->hasMany('App\Models\Item');

    }
}
