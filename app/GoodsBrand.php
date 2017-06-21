<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsBrand extends Model
{
	  //1.1软删除
     use SoftDeletes;

    protected $table = 'brand';

  
    //    protected $fillable = [
    //     'name', 'url', 'logo','intro'
    // ];

     // public $timestamps = false;   //公用的


     //1.2 软删除设置属性
    protected $dates = ['delete_at'];

    //1.3 php artisan make:migration alter_posts_deleted_at --table=posts 生成迁移表
  

  	//1.4修改迁移表，加入 $table->softDeletes(); 即可
  	//1.5 执行迁移 php artisan migrate
}
