<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
	  use SoftDeletes;

       protected $fillable = ['name'];

        protected $dates = ['delete_at'];

       public function user()
       {
       		return $this->belongsTo(Tasks::class);
       }
}
