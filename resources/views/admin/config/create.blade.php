@extends( 'layouts.admin' )
@section( 'content' )
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">Index</a> &raquo; Website Configuration
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>Operation</h3>
        @if( count( $errors ) > 0 )
            <div class="mark">
                @if( is_object( $errors ) )
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url( 'admin/config/create' )}}"><i class="fa fa-plus"></i>New Configuration</a>
            <a href="{{url( 'admin/config' )}}"><i class="fa fa-recycle"></i>Configurations</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url( 'admin/config' )}}" method="post">

        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>Title：</th>
                <td>
                    <input type="text" name="conf_title">
                    <span><i class="fa fa-exclamation-circle yellow"></i>Title is required</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>Name：</th>
                <td>
                    <input type="text" name="conf_name">
                    <span><i class="fa fa-exclamation-circle yellow"></i>Name is required</span>
                </td>
            </tr>

            <tr>
                <th>Type：</th>
                <td>
                    <label for="input"><input type="radio" id="input" name="field_type" checked onclick="showTr()" value="input">input &nbsp;</label>
                    <label for="textarea"><input type="radio" id="textarea" name="field_type" onclick="showTr()" value="textarea">textarea &nbsp;</label>
                    <label for="radio"><input type="radio" id="radio" name="field_type" onclick="showTr()" value="radio">radio</label>
                    <span><i class="fa fa-exclamation-circle yellow"></i>Type：input textarea radio</span>
                </td>
            </tr>
            <tr class="field_value">
                <th>Value：</th>
                <td>
                    <input type="text" class="lg" name="field_value">
                    <p><i class="fa fa-exclamation-circle yellow"></i>Only need to be set when type is radio，Format：1|On,0|Off</p>
                </td>
            </tr>


            <tr>
                <th>Order：</th>
                <td>
                    <input type="text" class="sm" name="conf_order" value="0">
                </td>
            </tr>
            <tr>
                <th>Description：</th>
                <td>
                    <textarea name="conf_tips" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="Submit">
                    <input type="button" class="back" onclick="history.go(-1)" value="Back">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script>
    showTr();
    function showTr(){
        var type = $( "input[name='field_type']:checked").val();
        if( type == 'radio' ){
            $( ".field_value").show();
        }else{
            $( ".field_value").hide();
        }
    }
</script>
@endsection
