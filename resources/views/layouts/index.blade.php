<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>后台系统 - @yield('meta_title') </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/admin/css/general.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/css/page.css" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
<body>
<h1>
    @section('add')
        <span class="action-span"><a href="@yield('addUrl')">增加 @yield('meta_title') </a></span>
    @show()

    <span class="action-span1"><a href="#">韩国馆 管理中心</a></span>
    <span id="search_id" class="action-span1"> - @yield('meta_title')  </span>
    <div style="clear:both"></div>
</h1>

@section('search')

    <div class="form-div">
        <form action="{:U()}" name="searchForm">
            <img src="/admin/images/icon_search.gif" width="26" height="22" border="0" alt="search"/>
            <input type="text" name="keyword" size="15"/>
            <input type="submit" value="submit" class="button"/>
        </form>
    </div>

@show


@yield('center')


<div id="footer"></div>

<script type="text/javascript" src="/admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="/admin/layer/layer.js"></script>
<script type="text/javascript" src="/admin/js/common.js"></script>


@yield('js')

<script type="text/javascript">
    $(function () {

    })
</script>
</body>
</html>