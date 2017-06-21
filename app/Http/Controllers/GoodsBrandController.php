<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\GoodsBrand;

use Storage;



//use Illuminate\Support\Facades\Session;  

class GoodsBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = \App\GoodsBrand::paginate(15);
       $data = array(
            'rows'=>$rows,
            'meta_title'=>'品牌',
            'addUrl'=>url('GoodsBrand/create')
        );
        return view('goodsbrand.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // dd(Session::all());
         $data = array(
            'meta_title'=>'品牌',
            'indexUrl'=>url('GoodsBrand/index')
        );
        return view('goodsbrand.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->isMethod('POST')){
            
            $file = $request->file('logo');
            if($file && $file->isValid()){

                $ext = $file->getClientOriginalExtension();
                
                $size = $file->getClientSize();
                if($size > 1048576) return  redirect()->back()->with('error','文件大小不符合');

                if(!in_array(strtolower($ext),['jpg','png']))  return  redirect()->back()->with('error','文件格式不正确');
                
                $name = 'brand_'.date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                //存储在本地磁盘
                 Storage::disk('uploads')->put(
                    $name,
                    file_get_contents($file->getRealPath())
                );

            }else{
                return redirect()->back()->with('error','文件需要上传');
            }
    
            $this->validate($request, [
                'name' => 'required|max:255',
                // 'logo' => 'required|max:255',
                'url' => 'required|max:255',
                'status' => 'required|integer',
                'sort' => 'required|integer'
            ],[
                'required'  =>':attribute 是必填项',
                'max'       =>':attribute 超过最大长度',
                'integer'   =>':attribute 必须正整数'
            ],[
                'name' =>'名称',
                // 'logo' =>'品牌logo',
                'url' =>'品牌官网',
                'status' =>'使用状态',
                'sort' =>'展示排序'
            ]);

            $goodsBrand = new GoodsBrand();
            $goodsBrand->name = $request->name;
            $goodsBrand->logo = $name;
            $goodsBrand->url   = $request->url;
            $goodsBrand->intro = $request->intro;
            $goodsBrand->status = $request->status;
            $goodsBrand->sort = $request->sort;

            if($goodsBrand->save()){

                return redirect('/GoodsBrand/index');

            }else{
                 return  redirect()->back()->with('error','添加失败');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // $goodsBrand = new GoodsBrand();
          // $row = $goodsbrand->find($id);
          $row =   \App\GoodsBrand::find($id);

    
            $data = array(
            'row'=>$row,
            'meta_title'=>'品牌'
        );

        return  view('goodsbrand.edit',$data);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //使用delete 需要先查询id ,然后delete().如果知道id ,直接调用destory($id)

        //$brand = new GoodsBrand();
        $brand = GoodsBrand::find($id);
        $brand->delete();

        if($brand->trashed()){
            $data = array(
                'status'=>1,'info'=>'成功','url'=>url('GoodsBrand/index')
            );
            return json_encode($data);
            // return redirect('/GoodsBrand/index')->with('success','删除成功');
        }
        $data = array(
            'status'=>0,'info'=>'失败' 
        );
        return json_encode($data);
        // return  redirect()->back()->with('error','删除失败');
    }
}
