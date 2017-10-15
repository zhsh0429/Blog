@extends( 'layouts.admin' )
@section( 'content' )
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">Index</a>  &raquo; System Information
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
{{--<div class="result_wrap">--}}
    {{--<div class="result_title">--}}
        {{--<h3>快捷操作</h3>--}}
    {{--</div>--}}
    {{--<div class="result_content">--}}
        {{--<div class="short_wrap">--}}
            {{--<a href="#"><i class="fa fa-plus"></i>新增文章</a>--}}
            {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
            {{--<a href="#"><i class="fa fa-refresh"></i>更新排序</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!--结果集标题与导航组件 结束-->


<div class="result_wrap">
    <div class="result_title">
        <h3>System Information</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>Operation System</label><span><?= PHP_OS?></span>
            </li>
            <li>
                <label>Environment</label><span><?= $_SERVER['SERVER_SOFTWARE']?></span>
            </li>
            <li>
                <label>PHP Configure</label><span><?= php_sapi_name()?></span>
            </li>
            <li>
                <label>Version</label><span>v-1.0</span>
            </li>
            <li>
                <label>Maximum size of uploading</label><span><?= get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"not allowed"; ?></span>
            </li>
            <li>
                <label>NZ time</label><span><?= date( 'Y-m-d H:i:s' )?></span>
            </li>
            <li>
                <label>Server Address/IP</label><span><?= $_SERVER['SERVER_NAME']?> [ <?= $_SERVER['SERVER_ADDR']?> ]</span>
            </li>
            <li>
                <label>Host</label><span>127.0.0.1</span>
            </li>
        </ul>
    </div>
</div>
@endsection
