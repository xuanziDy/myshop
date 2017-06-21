@extends('layouts.edit')
@section('meta_title',$meta_title)
@section('indexUrl',$indexUrl)
@section('css')
    <link href="{{ asset('admin/uploadify/uploadify.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('form')
   @include('layouts.errors')

    <form method="post" action="{{ url('GoodsBrand/store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">品牌名称</td>
                <td>
                    <input type="text" name="name" maxlength="60" value="">
                    <span class="require-field">{{ old('name')?old('name'):'*' }}</span>
                </td>
            </tr>
            <tr>
                <td class="label">品牌网址</td>
                <td>
                    <input type="text" name="url" maxlength="60" value="">
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">品牌LOGO</td>
                <td>
                    <input type="file" name="upload-logo" id="upload-logo"/>
                    <input type="hidden" class="logo" name="logo" value="" />

                    <div class="upload-img-box" style="">
                        <div class="upload-pre-item">
                            <img src="" />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="label">品牌描述</td>
                <td>
                    <textarea name="intro" cols="60" rows="4"></textarea>
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">状态</td>
                <td>
                    <input type="radio" class="status" value="1" name="status"/>是
                    <input type="radio" class="status" value="0" name="status"/>否
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">排序</td>
                <td>
                    <input type="text" name="sort" maxlength="60" value="">                   
                     <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br />
                    <input type="submit" class="button" value=" 确定 " />
                    <!-- <input type="reset" class="button" value=" 重置 " /> -->
                    <input type="button" class="button" value=" 返回 " onclick="window.history.back()" />
                </td>
            </tr>
        </table>
    </form>
@endsection

