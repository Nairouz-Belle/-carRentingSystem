
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Rentaly - Multipurpose Vehicle Car Rental Website Template</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Rentaly - Multipurpose Vehicle Car Rental Website Template" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
    <link href="css/plugins.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/coloring.css" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" />
    <!-- countdown -->
    <link id="colors" href="css/jquery.countdown.css" rel="stylesheet" type="text/css" />
</head>

<body class="dark-scheme">
    <div id="wrapper">
        
        <!-- page preloader begin -->
        <div id="de-preloader"></div>
        <!-- page preloader close -->
        <div style="display:none;">@include('front-end.nav')</div>
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <section id="section-hero" class="jarallax text-light pt50 pb50 vertical-center" aria-label="section">
                <img src="images/background/11.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h1>@lang('messages.Something went Wrong')</h1>
                            <p>@lang('messages.Your account is currently being processed and is not yet active') !</p>
                            <a href="{{url('/home')}}" class="btn-main">@lang('messages.Go Back')</a>
                            <div class="spacer-10"></div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <h1 class="s2">
                                <span class="c1">404</span>
                                <span class="spacer-single"></span>
                                <span class="c3">@lang('messages.Not Found')</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </div>
        <!-- content close -->
    </div>
    
    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>

</body>

</html>