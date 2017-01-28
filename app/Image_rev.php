<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_rev extends Model
{
    public function image()
    {
        return $this->hasMany('App\Images');
    }
}
