 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog------</title>

    <!-- Bootstrap Core CSS -->
    <link href="btts_62_stylish-portfolio/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="btts_62_stylish-portfolio/css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="btts_62_stylish-portfolio/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand">
            <a href="/" onclick=$("#menu-close").click();>Start Blog</a>
        </li>
        @if(Auth::check())
            <li>
                <a href="home" onclick=$("#menu-close").click();>home</a>
            </li>
            @if(Auth::user()['admin']=='1')
                <li>
                    <a href="admin" onclick=$("#menu-close").click();>admin</a>
                </li>
                @endif
        @else
        <li>
                <a href="login" onclick=$("#menu-close").click();>login</a>
            </li>
            <li>
                <a href="register" onclick=$("#menu-close").click();>register</a>
            </li>
            @endif
    </ul>
</nav>

<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical-center">
        <p style="font-size: 150px"><b >Start Blog</b></p>
        <h3>------------------------ A blog that remains shut is but a block------------------------ </h3>
        <br>
        <a href="#about" class="btn btn-dark btn-lg">Enter it</a>
    </div>
</header>

<!-- About -->
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Welcome to Blog!</h2>
                <p class="lead">Recording your everything daily life and share with your friends!</p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!-- Services -->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<section id="services" class="services bg-primary">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-10 col-lg-offset-1">
                <h2>Function</h2>
                <hr class="small">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
                            <h4>
                                <strong>Scan Blog</strong>
                            </h4>
                            <p>scan the newest blogs from others and write down the comment on it</p>
                            <a href="scan_view" class="btn btn-light">scan</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                            <h4>
                                <strong>Create Blog</strong>
                            </h4>
                            <p>write down everything you want to share with others</p>
                            <a href="create_view" class="btn btn-light">Create</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                            <h4>
                                <strong>Manage Blog</strong>
                            </h4>
                            <p>Delete or revise your blogs and your comments and make it cooool!</p>
                            <a href="manage_view" class="btn btn-light">Manage</a>
                        </div>
                    </div>
                    {{--<div class="col-md-3 col-sm-6">--}}
                        {{--<div class="service-item">--}}
                                {{--<span class="fa-stack fa-4x">--}}
                                {{--<i class="fa fa-circle fa-stack-2x"></i>--}}
                                {{--<i class="fa fa-shield fa-stack-1x text-primary"></i>--}}
                            {{--</span>--}}
                            {{--<h4>--}}
                                {{--<strong>暂无</strong>--}}
                            {{--</h4>--}}
                            {{--<p>暂无</p>--}}
                            {{--<a href="#" class="btn btn-light">暂无</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>

<!-- Callout -->
<aside class="callout">
    <div class="text-vertical-center">
        <h1>敬请期待....</h1>
    </div>
</aside>
<footer>
<center>By zhy</center>
    <center>phone number:13672092237</center>
    <center>2017.4.25</center>
</footer>
<!-- jQuery -->
<script src="btts_62_stylish-portfolio/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="btts_62_stylish-portfolio/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
        var that = $(this);
        // Disable the click handler until the user leaves the map area
        that.off('click', onMapClickHandler);
        // Enable scrolling zoom
        that.find('iframe').css("pointer-events", "auto");
        // Handle the mouse leave event
        that.on('mouseleave', onMapMouseleaveHandler);
    }
    // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
</script>

</body>
</html>
