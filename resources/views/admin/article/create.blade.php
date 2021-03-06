@extends( 'layouts.admin' )
@section( 'content' )
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url( 'admin/info' )}}">Index</a> &raquo; New Article
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>Operations</h3>
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
            <a href="{{url( 'admin/article/create' )}}"><i class="fa fa-plus"></i>Create</a>
            <a href="{{url( 'admin/article' )}}"><i class="fa fa-recycle"></i>All</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url( 'admin/article' )}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>Category：</th>
                <td>
                    <select name="cate_id">
                        @foreach( $data as $v )
                            <option value="{{$v->id}}">{{$v->_cate_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Title：</th>
                <td>
                    <input type="text" class="lg" name="art_title">
                </td>
            </tr>
            <tr>
                <th>Cover Photo：</th>
                <td>

                    <script src="{{asset( 'resources/org/uploadify/jquery.uploadify.min.js' )}}" type="text/javascript"></script>
                    <link rel="stylesheet" type="text/css" href="{{asset( 'resources/org/uploadify/uploadify.css' )}}">
                    <input type="text" size="50" name="art_thumb">
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                </td>
                <script type="text/javascript">
                    <?php $timestamp = time();?>
                    $(function() {
                                $('#file_upload').uploadify({

                                    'formData'     : {
                                        'timestamp' : '<?php echo $timestamp;?>',
                                        '_token'     : '{{csrf_token()}}',
                                    },
                                    'buttonText':'Upload',
                                    'swf'      : '{{asset( 'resources/org/uploadify/uploadify.swf' )}}',
                                    'uploader' : '{{url( "admin/upload" )}}',
                                    'onUploadSuccess' : function(file, data, response) {
                                        $( '#art_thumb_v' ).attr( 'src','/'+data).css( {'width':'350px','heigth':'50px'} );
                                        $( 'input[name="art_thumb"]' ).val( data );
                                    }
                                });
                            });
                </script>
                <style>
                    .uploadify{
                        display:inline-block;
                    }
                    .uploadify-button{border:none;border-radius:5px;margin-top:8x;}
                    table.add_tab tr td span.uploadify-button-text{color:#fff;margin:0}
                </style>
            </tr>
            <tr>
                <th></th>
                <td>
                    <img id="art_thumb_v" alt="" >
                </td>
            </tr>
            <tr>
                <th>Tags：</th>
                <td>
                    <input type="text" size="50" name="art_tag">
                </td>
            </tr>

            <tr>
                <th>Description：</th>
                <td>
                    <textarea name="art_description"></textarea>
                </td>
            </tr>
            <tr>
                <th>Author：</th>
                <td>
                    <input type="text" size="20" name="art_editor"></input>
                </td>
            </tr>
            <tr>
                <th>Text：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="{{asset( 'resources/org/ueditor/ueditor.config.js' )}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset( 'resources/org/ueditor/ueditor.all.min.js' )}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset( 'resources/org/ueditor/lang/en/en.js' )}}"></script>
                    <script id="editor" name="art_content" type="text/plain" style="width:860px;height:400px;"></script>
                    <script>
                        var ue = UE.getEditor('editor');
                    </script>
                </td>
                <style>
                    .edui-default{line-height: 28px;}
                    div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body{
                        overflow: hidden;height:20px;
                    }
                    div.edui-box{overflow: hidden;height: 22px;}
                </style>
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
@endsection
