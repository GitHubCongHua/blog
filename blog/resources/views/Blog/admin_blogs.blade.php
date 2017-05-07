<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>


    <link href="btts_62_stylish-portfolio/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="btts_62_stylish-portfolio/css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="btts_62_stylish-portfolio/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="startbootstrap-sb-admin-2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="startbootstrap-sb-admin-2/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="startbootstrap-sb-admin-2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="startbootstrap-sb-admin-2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="startbootstrap-sb-admin-2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <div class="col-lg-13">
        <div class="panel panel-default">
            <div class="panel-heading">
                博客一览
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>标题</th>
                            <th>内容</th>
                            <th>作者</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>#</td>
                                <td><a href="blog_content/{{$blog->unique_id}}"><B>{{$blog->title}}</B></a></td>
                                <td><a href="blog_content/{{$blog->unique_id}}"><B>{{ str_limit($blog->content,20) }}</B></a></td>
                                <td><B>{{$blog->author}}</B></td>
                                <td><b>{{$blog->updated_at}}</b></td>
                                <td><b><a href="delete_blogs/{{$blog->unique_id}}">删除</a></b></td>

                            </tr>
                        @endforeach
                    </table>
                    {!! $blogs->links() !!}
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>


<script src="startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js"></script>
<script src="/Blog/public/btts_62_stylish-portfolio/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/Blog/public/btts_62_stylish-portfolio/js/bootstrap.min.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="startbootstrap-sb-admin-2/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="startbootstrap-sb-admin-2/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="startbootstrap-sb-admin-2/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="startbootstrap-sb-admin-2/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>
