<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsType extends Model
{
    //定义表，默认是名称加s
     protected $table = 'goods_type';
    //默认自动管理create_at 和 update_at字段，不需要设置为false
    public  $timestamps  = false;

    /* 获取基本可用的种类
     * @return mixed
     */
    public function getList(){
      return  $this->select('id,name,status');
    }

}