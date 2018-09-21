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


        @isset($hasTable)
            <!-- JQuery DataTable Css -->
            <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
        @endisset

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
            .table-responsive {
                overflow-x: hidden;
                overflow-y: hidden;
            }

            @media only screen and (max-width:1169px) {
               .bt-close-nav {
                   display: none;
               }
               .table-responsive {
                   overflow-x: auto;
               }
            }

            .page-loader-wrapper {
                opacity: 0.8;
            }

            .form-group .form-line.focused:after {
                border-bottom-color: grey;
            }

            table td {
                vertical-align: middle !important;
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
                <p>@lang('system.please_wait')</p>
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
                        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">settings</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->

        @include('layouts.sidebar')


        <section class="content">
            <div class="container-fluid">
                {{--<div class="block-header">
                    <h2>@yield('title')</h2>
                </div>--}}
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


        <!-- Bootstrap Notify Plugin Js -->
        <script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>


        <!-- Waves Effect Plugin Js -->
        <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

        @isset($hasTable)
            <!-- Jquery DataTable Plugin Js -->
            <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
            <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

        @endisset

        <!-- Custom Js -->
        <script src="{{asset('js/admin.js')}}"></script>

        <!-- Demo Js -->
        <script src="{{asset('js/demo.js')}}"></script>
    
        <script>
            "use strict";
            const token = document.getElementsByName('csrf-token')[0].getAttribute('content');
            const demo_skin = document.querySelector('.demo-choose-skin');
            //console.log(demo_skin);

            function objectifyForm(formArray) {//serialize data function

                var returnArray = {};
                for (var i = 0; i < formArray.length; i++){
                    returnArray[formArray[i]['name']] = formArray[i]['value'];
                }
                return returnArray;
            }

            function post(path, params, method) {
                method = method || "post";

                var form = document.createElement("form");

                //Move the submit function to another variable
                //so that it doesn't get overwritten.
                form._submit_function_ = form.submit;

                form.setAttribute("method", method);
                form.setAttribute("action", path);

                for(var key in params) {
                    let hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);
                    form.appendChild(hiddenField);
                }

                document.body.appendChild(form);
                form.submit(); //Call the renamed function.
            }

            function loadStart() {
                $('.page-loader-wrapper').css('display','block');
            }

            function loadStop() {
                $('.page-loader-wrapper').css('display','none');
            }

            function showNotification(text) {
                if (text === null || text === '') { text = 'Berhasil'; }
                let colorName = 'bg-black';
                let placementFrom = 'top';
                let placementAlign = 'right';
                let animateEnter = 'animated zoomInRight';
                let animateExit = 'animated zoomOutRight';
                let allowDismiss = false;

                $.notify({
                            message: text
                        },
                        {
                            type: colorName,
                            allow_dismiss: allowDismiss,
                            newest_on_top: true,
                            timer: 1000,
                            placement: {
                                from: placementFrom,
                                align: placementAlign
                            },
                            animate: {
                                enter: animateEnter,
                                exit: animateExit
                            },
                            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            '</div>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            '</div>'
                        });
            }
            $(function () {
                @isset($hasTable)
                $('.js-basic-example').DataTable({
                    responsive: true,
                    columnDefs: [
                        { orderable: false, targets: -1 }
                    ]
                });
                $('.js-exportable').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    columnDefs: [
                        { orderable: false, targets: -1 }
                    ]
                });
                @endisset

                $('.waves-block').addClass('waves-{{Auth::user()->theme}}');
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
                demo_skin.querySelector('li[data-theme={{Auth::user()->theme}}').classList.add("active");
                demo_skin.addEventListener("click", function(e) {
                    e.preventDefault();
                    let url  = '{{ route('changeTheme') }}';
                    let theme = e.target.dataset.theme;
                    $.post(url, {
                        _token : token,
                        theme : theme
                    },function(data){
                    }).fail(function(response) {
                        alert('Error: ' + response.responseText);
                    }).done(function () {
                        showNotification(null);
                    });
                });


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
            });
        </script>



        @yield('script')

    </body>

</html>