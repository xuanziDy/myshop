<!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>韩国馆 管理中心 - 添加 @yield('meta_title') </title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/admin/css/general.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/css/main.css" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
<body>
<h1>
    @section('title')
        <span class="action-span"><a href="@yield('indexUrl')"> @yield('meta_title')列表</a></span>
        <span class="action-span1"><a href="#">韩国馆 管理中心</a></span>
        <span id="search_id" class="action-span1"> - @yield('meta_title') </span>
        <div style="clear:both"></div>
    @show
</h1>
<div class="main-div">
    @yield('form')
</div>

<div id="footer">

</div>

<script type="text/javascript" src="/admin/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="/admin/layer/layer.js"></script>
<script type="text/javascript" src="/admin/js/common.js"></script>
@yield('js')
<script type="text/javascript">
//    $(function () {
//        //>>1.给是否显示的单选按钮设置值，让它被选中
//        $('.status').val([{$status |default = 1}]);
//    });
</script>
</body>
</html>