<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'name', 'description', 'collection_id', 'price'

    ];

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function collection()
    {

        return $this->belongsTo('App/Models/Collection');
    }

}
