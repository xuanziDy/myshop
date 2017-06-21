@extends('layouts.edit')
@section('meta_title',$meta_title)
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
                    <input type="text" name="name" maxlength="60" value="{{ $row->name }}">
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">品牌网址</td>
                <td>
                    <input type="text" name="url" maxlength="60" value="{{ $row->url }}">
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">品牌LOGO</td>
                <td>
                    <input type="file" name="logo" id="upload-logo"/>
                    
                    <div class="upload-img-box" style="display: {{ $row->logo?'block':'none'}} ">
                        <div class="upload-pre-item">
                            <img src="{{ asset('uploads/'.$row->logo) }}" />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="label">品牌描述</td>
                <td>
                    <textarea name="intro" cols="60" rows="4">{{ $row->intro }}</textarea>
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">状态</td>
                <td>
                    <input type="radio" class="status" value="1" name="status"  {{ $row->status ==1 ? 'checked' : ''}} />是
                    <input type="radio" class="status" value="0" name="status"  {{ $row->status ==0 ? 'checked' : ''}}/>否
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">排序</td>
                <td>
                    <input type="text" name="sort" maxlength="60" value="{{ $row->sort }}">                   
                     <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br />
                    <input type="hidden"  name="id" value="{{ $row->id }}" />
                    <input type="submit" class="button " value=" 确定 " />
                    <input type="button" class="button" value=" 返回 " onclick="window.history.back()" />

                    <!-- <a href="javascript:history.back()" class="button">返回</a> -->

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </td>
            </tr>
        </table>
    </form>
@endsection
