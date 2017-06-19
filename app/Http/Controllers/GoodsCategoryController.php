<?php
/**
 * Created by PhpStorm.
 * User: dy
 * Date: 2017/6/10
 * Time: 15:41
 */

namespace App\Http\Controllers;

use App\GoodsCategory;

use Illuminate\Http\Request;
//use App\Http\Requests;

//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;


class GoodsCategoryController extends Controller
{
    protected $meta_title = "商品分类";

    public function index(){
        //得到按分类顺序排类的数据。
//       $rows = DB::table('goods_category')->where('status','>=',0)->orderBy('lft')->get();
//       $rows =  App\GoodsCategory::where('status','>=',0)->orderBy('lft')->get();
        $GoodsCategory = new GoodsCategory();
        $rows = $GoodsCategory->getList();
//        $rows = $GoodsCategory::where('status','>=',0)->orderBy('lft')->get();

        return view('goodscategory.index',['rows'=>$rows])->with('meta_title',$this->meta_title);
    }

    public function add(Request $request){





        //1.准备数据
        $GoodsCategory = new GoodsCategory();
        $nodes = $GoodsCategory->getList();
        //准备商品种类
//        $goodsType = new GoodsType();
//        $types = $goodsType->getList();
//        $types = DB::table('goods_type')->select('id','name','status')->get();

       $types =  \App\GoodsType::select('id','name','status')->get();
        $data = array(
            'nodes' => $nodes,
            'types' => $types,
            'meta_title' =>$this->meta_title
        );
        //2.保存数据
        if($request->isMethod('POST')){
              $this->validate($request, [
                'name' => 'required|max:255',
                'status' => 'required',
                'sort' => 'required|integer',
            ],[
                  'required'=>':attribute 为必填项',
                  'max'=>':attribute 长度不符合要求',
                  'integer'=>':attribute 必须为整数'
              ],[
                  'name'=>'姓名',
                  'status'=>'状态',
                  'sort'=>'排序'
              ]);

            //验证
            $data =  $request->input();
            $goodsCate = new GoodsCategory();
            $goodsCate->name = $data['name'];
            $goodsCate->parent_id = $data['parent_id'];
            $goodsCate->type = $data['type'];
            $goodsCate->intro = $data['intro'];
            $goodsCate->level = $data['level'];
            $goodsCate->sort = $data['sort'];
            $goodsCate->status = $data['status'];

            if($goodsCate->save()){
                return redirect('/GoodsCategory/index');
//                return redirect()->action('GoodsCategory@index');  //??
            }
            return back()->withInput(); //将输入存储到一次性 Session 然后重定向

        }
        return view('goodscategory.add',$data);
//        return view('goodscategory.add',compact('nodes','types'))->with('meta_title',$this->meta_title);

    }

    //ajax保存
    public function save(Request $request){
//        dd(Request::all());
//        $this->validate($request, [
//            'name' => 'required|max:255',
//            'status' => 'required',
//            'sort' => 'required',
//        ]);
//        $input = Request::all();
//        GoodsCategory::create($input);



        return redirect('/GoodsCategory/index');


    }

    public function session1(Request $request){
        //http 请求 seesion
//        $request->session()->put('key1','dengying');
//        echo $request->session()->get('key1');

            //辅助函数
//        session()->put('key2','value2');
//       echo session()->get('key2');

        //门面
//        Session::put('key3','value3');
//        echo Session::get('keys3','default');
//
//        Session::pull('DY');

//        Session::push('DY',['key1'=>'xxxx']);
//        Session::push('DY',['key2'=>'gggg']);

        Session::put('key1','dying');
        Session::put('key2','yiobb');



    }

    public function session2(Request $request){
//       echo $request->session()->get('key1');
        $rst =  Session::all();

        var_dump($rst);

     echo    Session::has('key4')?'yes':'no';


        Session::forget('key1');
        $rst =  Session::all();
        var_dump($rst);

////
//        $rst =  Session::pull('DY','meiyou');
//
//        var_dump($rst);


    }


    //钩子函数，让父类调用子类的方法
//    protected function _before_show_view(){
//        //得到数需要的数据(json字符串)
//        $rows=$this->model->getList();
//        //准备商品种类
//        $types=M('GoodsType')->field('id,name,status')->select();
//
//        $this->assign('nodes',json_encode($rows));
//        $this->assign('types',$types);
//    }

}