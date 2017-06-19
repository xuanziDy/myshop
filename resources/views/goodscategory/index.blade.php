@extends('layouts.index')
@section('meta_title',$meta_title)
@section('addUrl',route('GoodsCateAdd'))
<!---需要这部分内容，又不需要追加别的内容，直接不覆写即可-->
{{--@section('add')       --}}

<!--覆写，让原始部分为空-->
@section('search')
@endsection



@section('css')
    <link href="/admin/treegrid/css/jquery.treegrid.css" rel="stylesheet" type="text/css"/>
@endsection

@section('center')
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1" class="tree">
            <tr>
                <th>分类名称</th>
                <th>分类简介</th>
                <th>级别</th>
                <th>状态</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
            @foreach($rows as $row)
                <tr class="treegrid-{{ $row->id }}
                    @if ($row->level !=1){
                        treegrid-parent-{{ $row->parent_id }}
                    }@endif
                     ">
                <td>{{ $row->name  }}</td>
                <td align='center'> {{ $row->intro }}</td>
                <td align='center'>{{ $row->level }}</td>
                <td align="center"><a class="ajax-get_1" href="#">
                        <img src="/admin/images/{{ $row->status }}.gif" alt=""/></a>
                </td>
                <td align='center'>{{ $row->sort }}</td>
                <td align="center">
                    <a href="{{ route('GoodsCateEdit',['id'=>$row->id]) }}" title="编辑">编辑</a> |
                    <a class="ajax-get" href="{{ route('GoodsCateDel',['id'=>$row->id]) }}" title="移除">移除</a>
                </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="/admin/treegrid/js/jquery.treegrid.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.tree').treegrid();
        });
    </script>
 @endsection