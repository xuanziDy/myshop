<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsBrand extends Model
{
    protected $table = 'brand';
    // protected $timestamp = false;
  
       protected $fillable = [
        'name', 'url', 'logo','intro'
    ];


     public $timestamps = false;   //公用的
}
