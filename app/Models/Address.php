<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Address extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'user_id', 'first_name', 'last_name', 'adrress_1', 'address_2', 'city', 'country', 'state', 'zip', 'phone', 'default'];

    public function users()
    {
        $this->belongsTo('App\Models\User');
    }

}
