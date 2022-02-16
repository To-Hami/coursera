
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/FrontEnd/img//apple-icon.png">
    <link rel="icon" type="image/png" href="/FrontEnd/img//favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
       @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/FrontEnd/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/FrontEnd/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/FrontEnd/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
<!-- Navbar -->
@include('layouts.nav')
<!-- End Navbar -->
@yield('header')
@yield('content')
@yield('statics')
@yield('contact-us')
<script src="/FrontEnd/js/core/jquery.min.js"></script>

</body>
<footer class="footer footer-black  footer-white ">
    <div class="" style=" background-color: #f7765f;color: aliceblue;
    padding: 0 69px;
    height: 45px;">
        <div class="row" style="display: flex;height: 20px">

                        <a href="https://wa.me/+24990049307">
                            <strong style="font-family: cursive; color: white"><span class="fa fa-whatsapp"></span> Tohami Code </strong>

                        </a>


            <div class=" ml-auto" style="color: white">
            <span class="copyright" style="color: white">
made with <i class="fa fa-heart heart"></i>  Corsera_web.com   ©
              <script>

                document.write(new Date().getFullYear())
              </script>

            </span>
            </div>
        </div>
    </div>
</footer>
{{--<div class="main">--}}

{{--    <footer class="footer footer-black  footer-white ">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <nav class="footer-nav">--}}

{{--                </nav>--}}
{{--                <div class="credits ml-auto">--}}
{{--            <span class="copyright">--}}
{{--              ©--}}
{{--              <script>--}}
{{--                document.write(new Date().getFullYear())--}}
{{--              </script>, made with <i class="fa fa-heart heart"></i> by Tohami--}}
{{--            </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
    <!--   Core JS Files   -->
    <script src="/FrontEnd/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="/FrontEnd/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/FrontEnd/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="/FrontEnd/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="/FrontEnd/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="/FrontEnd/js/plugins/moment.min.js"></script>
    <script src="/FrontEnd/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
    <script src="/FrontEnd/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script>
        $(document).ready(function () {

            if ($("#datetimepicker").length != 0) {
                $('#datetimepicker').datetimepicker({
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-chevron-up",
                        down: "fa fa-chevron-down",
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-screenshot',
                        clear: 'fa fa-trash',
                        close: 'fa fa-remove'
                    }
                });
            }

            function scrollToDownload() {2

                if ($('.section-download').length != 0) {
                    $("html, body").animate({
                        scrollTop: $('.section-download').offset().top
                    }, 1000);
                }
            }
        });
    </script>

</html>
