<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />

        <style>
            .right-sidebar .user-info {
                padding: 13px 15px 12px 15px;
                white-space: nowrap;
                position: relative;
                border-bottom: 1px solid #e9e9e9;
                background: url("{{asset('images/user-img-background.jpg')}}") no-repeat no-repeat;
                height: 135px; }
            .right-sidebar .user-info .image {
                margin-right: 12px;
                display: inline-block; }
            .right-sidebar .user-info .image img {
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                -ms-border-radius: 50%;
                border-radius: 50%;
                vertical-align: bottom !important; }
            .right-sidebar .user-info .info-container {
                cursor: default;
                display: block;
                position: relative;
                top: 25px; }
            .right-sidebar .user-info .info-container .name {
                white-space: nowrap;
                -ms-text-overflow: ellipsis;
                -o-text-overflow: ellipsis;
                text-overflow: ellipsis;
                overflow: hidden;
                font-size: 14px;
                max-width: 200px;
                color: #fff; }
            .right-sidebar .user-info .info-container .email {
                white-space: nowrap;
                -ms-text-overflow: ellipsis;
                -o-text-overflow: ellipsis;
                text-overflow: ellipsis;
                overflow: hidden;
                font-size: 12px;
                max-width: 200px;
                color: #fff; }
            .right-sidebar .user-info .info-container .user-helper-dropdown {
                position: absolute;
                right: -3px;
                bottom: -12px;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                -ms-box-shadow: none;
                box-shadow: none;
                cursor: pointer;
                color: #fff; }

            .bt-close-nav {
                display: block;
            }

            @media only screen and (max-width:1169px) {
               .bt-close-nav {
                   display: none;
               }
            }
        </style>



        @yield('css')
    </head>

    <body class="theme-{{Auth::user()->theme}}">
    <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-{{Auth::user()->theme}}">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>

                    <span id="btCloseNav" class="navbar-brand bt-close-nav" style="cursor: pointer" data-animate-enter="animated bounceIn"
                          data-animate-exit="animated bounceOut"><i style="line-height: 0.8" class="material-icons">arrow_back</i></span>
                    <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Call Search -->
                        <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                        <!-- #END# Call Search -->
                        <!-- Notifications -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">notifications</i>
                                <span class="label-count">7</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">NOTIFICATIONS</li>
                                <li class="body">
                                    <ul class="menu">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">person_add</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>12 new members joined</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 14 mins ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-cyan">
                                                    <i class="material-icons">add_shopping_cart</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>4 sales made</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 22 mins ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-red">
                                                    <i class="material-icons">delete_forever</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>Nancy Doe</b> deleted account</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 3 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-orange">
                                                    <i class="material-icons">mode_edit</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>Nancy</b> changed name</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 2 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-blue-grey">
                                                    <i class="material-icons">comment</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>John</b> commented your post</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 4 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">cached</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><b>John</b> updated status</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 3 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="icon-circle bg-purple">
                                                    <i class="material-icons">settings</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>Settings updated</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> Yesterday
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="javascript:void(0);">View All Notifications</a>
                                </li>
                            </ul>
                        </li>
                        <!-- #END# Notifications -->
                        <!-- Tasks -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">flag</i>
                                <span class="label-count">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">TASKS</li>
                                <li class="body">
                                    <ul class="menu tasks">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Footer display issue
                                                    <small>32%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Make new buttons
                                                    <small>45%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Create new dashboard
                                                    <small>54%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Solve transition issue
                                                    <small>65%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    Answer GitHub questions
                                                    <small>92%</small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="javascript:void(0);">View All Tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- #END# Tasks -->
                        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->

        @include('layouts.sidebar')


        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>@yield('title')</h2>
                </div>
                @yield('content')
            </div>
        </section>





        <!-- Jquery Core Js -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

        <!-- Select Plugin Js -->
        <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{asset('/plugins/node-waves/waves.js')}}"></script>

        <!-- Custom Js -->
        <script src="{{asset('js/admin.js')}}"></script>

        <!-- Demo Js -->
        <script src="{{asset('js/demo.js')}}"></script>
    
        <script>
            $(function () {
                $.fn.extend({
                    animateCss: function(animationName, callback) {
                        var animationEnd = (function(el) {
                            var animations = {
                                animation: 'animationend',
                                OAnimation: 'oAnimationEnd',
                                MozAnimation: 'mozAnimationEnd',
                                WebkitAnimation: 'webkitAnimationEnd',
                            };

                            for (var t in animations) {
                                if (el.style[t] !== undefined) {
                                    return animations[t];
                                }
                            }
                        })(document.createElement('div'));

                        this.addClass('animated ' + animationName).one(animationEnd, function() {
                            $(this).removeClass('animated ' + animationName);

                            if (typeof callback === 'function') callback();
                        });

                        return this;
                    },
                });

                //centang tema nya
                $('.demo-choose-skin').find("[data-theme={{Auth::user()->theme}}]").addClass('active');

                $('.demo-choose-skin li').on('click',function () {
                    var token = $('meta[name=csrf-token]').attr('content'), url  = '{{ route('changeTheme') }}';
                    var theme = $(this).attr('data-theme');
                    $.post(url, {
                        _token : token,
                        theme : theme
                    },function(data){
                    }).fail(function(response) {
                        alert('Error: ' + response.responseText);
                    }).done(function () {
                        $('#notif').trigger('click')

                    });

                });
                /*if($('.bars').css('display') === 'block'){
                    $('#btCloseNav').addClass('hidden')
                } else {
                    $('#btCloseNav').removeClass('hidden')
                }*/
                $('#btCloseNav').on('click',function () {
                    var icnya = $('#btCloseNav i.material-icons');
                    if (icnya.html()==="arrow_back") {
                        $('body').addClass("ls-closed");
                        icnya.html("menu");

                    } else {
                        $('body').removeClass("ls-closed");
                        icnya.html("arrow_back");
                    }
                    $(this).animateCss('bounceIn');
                });



            })
        </script>
    
    
    
        @yield('script')

    </body>

</html>