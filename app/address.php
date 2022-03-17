<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    //
    protected $fillable = [
        'zip_code', 'country',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
