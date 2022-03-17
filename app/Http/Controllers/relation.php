<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\employee;

class relation extends Controller
{
    //
    public function data(){
        return employee::find(2)->getdata;
    }
}
