<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    //定义表，默认是名称加s
     protected $table = 'goods_category';
    //默认自动管理create_at 和 update_at字段，不需要设置为false
//    public  $timestamps  = false;

    /* 获取基本可用的分类
     * @return mixed
     */
    public function getList(){
      return  $this->where('status','>=',0)->orderBy('lft')->get();
    }

}