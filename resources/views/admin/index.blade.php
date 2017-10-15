@extends( 'layouts.admin' )
@section( 'content' )
<!--头部 开始-->
<div class="top_box">
    <div class="top_left">
        <div class="logo">Background</div>
        <ul>
            <li><a href="{{url( '/' )}}" target="_blank" class="active">Index</a></li>
            <li><a href="{{url( 'admin/info' )}}" target="main">Admin Page</a></li>
        </ul>
    </div>
    <div class="top_right">
        <ul>
            <li>Administrator：{{session('user')}}</li>
            <li><a href="{{url( 'admin/pass' )}}" target="main">Change Password</a></li>
            <li><a href="{{url( 'admin/logout' )}}">Logout</a></li>
        </ul>
    </div>
</div>
<!--头部 结束-->

<!--左侧导航 开始-->
<div class="menu_box">
    <ul>
        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>Content</h3>
            <ul class="sub_menu">
                <li><a href="{{url( 'admin/category/create' )}}" target="main"><i class="fa fa-fw fa-plus-square"></i>New Category</a></li>
                <li><a href="{{url( 'admin/category' )}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Categories</a></li>
                <li><a href="{{url( 'admin/article/create' )}}" target="main"><i class="fa fa-fw fa-plus-square"></i>New Article</a></li>
                <li><a href="{{url( 'admin/article' )}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Articles</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-cog"></i>System</h3>
            <ul class="sub_menu" style="display: block;">
                <li><a href="{{url( 'admin/links' )}}" target="main"><i class="fa fa-fw fa-cubes"></i>Links</a></li>
                <li><a href="{{url( 'admin/navs' )}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Menu Bar</a></li>
                <li><a href="{{url( 'admin/config' )}}" target="main"><i class="fa fa-fw fa-cogs"></i>Website</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--左侧导航 结束-->

<!--主体部分 开始-->
<div class="main_box">
    <iframe src="{{url( 'admin/info' )}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
<!--主体部分 结束-->

<!--底部 开始-->
<div class="bottom_box">
    CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
</div>
<!--底部 结束-->
@endsection