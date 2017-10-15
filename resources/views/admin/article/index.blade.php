@extends( 'layouts.admin' )
        @section( 'content' )
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">Index</a> &raquo; List of Articles
</div>
<!--面包屑导航 结束-->

<!--结果页快捷搜索框 开始-->
{{--<div class="search_wrap">--}}
    {{--<form action="" method="post">--}}
        {{--<table class="search_tab">--}}
            {{--<tr>--}}
                {{--<th width="120">选择分类:</th>--}}
                {{--<td>--}}
                    {{--<select onchange="javascript:location.href=this.value;">--}}
                        {{--<option value="">全部</option>--}}
                        {{--<option value="http://www.baidu.com">百度</option>--}}
                        {{--<option value="http://www.sina.com">新浪</option>--}}
                    {{--</select>--}}
                {{--</td>--}}
                {{--<th width="70">关键字:</th>--}}
                {{--<td><input type="text" name="keywords" placeholder="关键字"></td>--}}
                {{--<td><input type="submit" name="sub" value="查询"></td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    {{--</form>--}}
{{--</div>--}}
<!--结果页快捷搜索框 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url( 'admin/article/create' )}}"><i class="fa fa-plus"></i>Create</a>
                <a href="{{url( 'admin/article' )}}"><i class="fa fa-recycle"></i>All</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th>Title</th>
                    <th>Click through</th>
                    <th>Release time</th>
                    <th>Author</th>
                    <th>Operation</th>
                </tr>
                @foreach( $data as $vo )
                <tr>
                    <td class="tc">{{$vo->id}}</td>
                    <td>
                        <a href="#">{{$vo->art_title}}</a>
                    </td>
                    <td>{{$vo->art_view}}</td>
                    <td>{{date( 'Y-m-d',$vo->art_time )}}</td>
                    <td>{{$vo->art_editor}}</td>

                    <td>
                        <a href="{{url( 'admin/article/'.$vo->id.'/edit' )}}">Edit</a>
                        <a href="javascript:;" onclick="delArt( {{$vo->id}} )">Delete</a>
                    </td>
                </tr>
                @endforeach

            </table>

            <div class="page_list">
                {{$data->links()}}
            </div>
            <style>
                .result_content ul li span{
                    font-size: 15px;
                    padding:6px 12px;
                }
            </style>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
    function delArt( art_id ){
        //询问框
        layer.confirm('Do you confirm to delete this article？', {
            btn: ['Yes','No'] //按钮
        }, function(){
            $.post( "{{url( 'admin/article/' )}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(e){
//                alert( e.msg );
//                layer.msg(e.msg, {icon: 1});
                if( e.code==0 ){
                    layer.msg(e.msg, {icon: 6});
                    location.href = location.href;
                }else{
                    layer.msg(e.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){
//            layer.msg('也可以这样', {
//                time: 20000, //20s后自动关闭
//                btn: ['明白了', '知道了']
//            });
        });
    }
</script>
        @endsection
