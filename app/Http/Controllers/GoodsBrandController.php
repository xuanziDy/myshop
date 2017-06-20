<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\GoodsBrand;

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
        // dd($rows);
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
        

            // $data = $request->input();
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
            $goodsBrand->logo = $request->logo;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
