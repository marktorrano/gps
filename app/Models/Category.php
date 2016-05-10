<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    //

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $visible = [
        'name', 'id'
    ];

    protected $fillable = [

        'name'

    ];

    public function collections()
    {
        return $this->hasMany('App\Models\Collection');
    }
}
