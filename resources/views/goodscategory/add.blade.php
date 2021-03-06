@extends('layouts.edit')
@section('meta_title',$meta_title)
@section('css')
    <link href="/admin/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css"/>
@endsection

@section('form')
   @include('layouts.errors')
    <form method="POST" action="{{ route('GoodsCateSave') }}">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">分类名称</td>
                <td>
                    <input type="text" name="name" maxlength="60" value=""> <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">父分类</td>
                <td>
                    <input type="hidden" name="parent_id" maxlength="60" value="1" class="parent_id">
                    <input type="text" name="parent_text" maxlength="60"  class="parent_text" disabled="disabled" value="默认是顶级分类">
                    <ul id="treeDemo" class="ztree"></ul>
                </td>
            </tr>
            <tr>
                <td class="label">所属种类</td>
                <td>
                    {{ arr2selected('type',$types,'') }}
                    <span  class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">分类简介</td>
                <td>
                    <textarea name="intro" cols="60" rows="4"></textarea>
                </td>
            </tr>
            <tr>
            <tr>
                <td class="label">状态</td>
                <td>
                    <input type="radio" name="status" value="1" class="status" checked="checked"/>是
                    <input type="radio" name="status" value="0" class="status"/>否
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">排序</td>
                <td>
                    {{--{!!  csrf_field() !!}--}}
                    <input type="text" name="sort" maxlength="60" value="">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br/>
                    {{--<input type="hidden" name="id" value=""/>--}}
                    <input type="submit" class="button ajax-post_1" value=" 确定 "/>
                    <input type="reset" class="button" value=" 重置 "/>
                </td>
            </tr>
        </table>
    </form>
@endsection
@section('js')
    <script type="text/javascript" src="/admin/zTree/js/jquery.ztree.core-3.5.js"></script>
    <script type="text/javascript">
        $(function () {
            //>>1.树的设置
            var setting = {
                data: {
                    simpleData: {
                        enable: true,
                        pIdKey: "parent_id",
                    }
                },
                callback: {
                    onClick: function(event, treeId, treeNode){
                        //第三个参数会得到当前单击的对象
                        $('.parent_text').val(treeNode.name);
                        $('.parent_id').val(treeNode.id);
                    }
                }
            };

            //>>2.(这里是json形式的数组)，准备树中需要的数据
            var zNodes = {!! $nodes !!} ;
            //>>3.将id为treeDemo的ul变成一个树，返回值是该对象。
            var treeObj = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            //>>4.展开节点
            treeObj.expandAll(true);

            /*>>5.-----------只有是编辑回显的时候，才需要将节点选中，并且父分类那里有值-----*/
             @if(!empty($id)){
                 var parent_id={{ $parent_id }}; //让php语言在js中使用
                var parentNode=treeObj.getNodeByParam('id',parent_id); //根据id去找值为parent_id的节点。
                if(!parentNode){
                    return;
                }
                treeObj.selectNode(parentNode); //选中给定值的节点。
                $('.parent_id').val(parentNode.id);
                $('.parent_text').val(parentNode.name);
            }@endif
        });
    </script>
@endsection