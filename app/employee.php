<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    //
    public function getdata(){
        return $this->hasOne('App\department');
    }
}
