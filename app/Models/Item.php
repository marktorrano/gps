<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'name', 'quantity', 'price', 'product_id'

    ];

    private $path;

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function brands()
    {

        return $this->belongsToMany('App\Models\Brand');

    }

    public function product()
    {

        return $this->belongsTo('App\Models\Product');

    }

    public function metas()
    {

        return $this->hasMany('App\Models\Meta');

    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');

    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

}
