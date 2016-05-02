<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meta extends Model {
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'name'

    ];

    public function items()
    {

        return $this->belongsToMany('App\Models\Item');

    }
}
