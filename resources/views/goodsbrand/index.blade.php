@extends('layouts.index')
@section('meta_title',$meta_title)
@section('addUrl',$addUrl)
@section('center')
    <div class="list-div" id="listDiv">
        <input type="button" class="button ajax-post" url="{{ url('GoodsBrand/changeStatus')}}" value="删除选中"/>
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th width="50px">序号<input type="checkbox" class="all"/></th>
                <th>品牌名称</th>
                <th>品牌地址</th>
                <th>品牌LOGO</th>
                <th>品牌简介</th>
                <th>状态</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
            @foreach($rows as $row)
                <tr>
                    <td align="center"><input type="checkbox" name="id[]" class="id" value="{{ $row->id}}"/></td>
                    <td align='center'>{{ $row->name }}</td>
                    <td align='center'>{{ $row->url }}</td>
                    <td align='center'><img src="/Uploads/{{ $row->logo }}" width="100px"/></td>
                    <!--<td align='center'><img src="__BRAND__/{$row.logo}!m"/></td>-->
                    <td align='center'>{{ $row->intro }}</td>
                    <td align="center"><a class="ajax-get"
                                          href="{{ url('GoodsBrand/changeStatus',array('id'=>$row['id'],'status'=>1-$row->status)) }}"><img
                            src="{{ asset('admin/images/'.$row->status.'.gif') }}" alt=""/></a></td>
                    <td align='center'>{{ $row->sort }}</td>
                    <td align="center">
                        <a href="{{ url('GoodsBrand/edit',array('id'=>$row->id)) }}" title="编辑">编辑</a> |
                        <a class="ajax-get" href="{{ url('GoodsBrand/destroy',array('id'=>$row->id)) }}" title="移除">移除</a>
                    </td>
                </tr>
           @endforeach
        </table>
        <div>
            @if(isset($success)){
                <div>{{ $success }}</div>
            }@endif
            <div class="pull-right">
                {!! $rows->render() !!}
            </div>
        </div>
    </div>
@endsection