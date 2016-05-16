<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    //
    protected $fillable = ['title', 'first_name', 'last_name', 'adrress_1', 'address_2', 'city', 'country', 'state', 'zip', 'phone'];

    public function users()
    {
        $this->belongsTo('App\Models\User');
    }

}
