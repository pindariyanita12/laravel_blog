<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    //
    public function author(){
        return $this->hasOne('App\author');
    }
}
