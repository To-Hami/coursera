@extends('layouts.app')
@section('title')
Corsera
@endsection
@section('header')
    <div class="page-header section-dark" style="background-image: url('/FrontEnd/img/web-en-html-die-vlakke-illustratie-programmeren-38055807.jpg')">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="title-brand">
                    <h1 class="presentation-title">Coursera</h1>
                    <div class="fog-low">
                    </div>
                    <div class="fog-low right">
                    </div>
                </div>
                <h2 class="presentation-subtitle text-center">Here You Can Get All Course You Need </h2>
            </div>
        </div>

    </div>

@endsection

@section('content')

    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2 style="    background-color: #f7765f;
    color: aliceblue;
    padding: 5px;
    width: 267px;
    border-radius: 5px;">Latest videos</h2>
                @if(request()->has('search') && request()->get('search') != '')
                    <p style="margin-top: 10px">
                        you are search on  <b>{{ request()->get('search') }}</b> |  <a href="{{ route('home') }}"> Reset </a>
                    </p>
                @endif
            </div>
            @include('front-end.shared.video-row')
        </div>
    </div>

@endsection
@section('statics')
    <div class="section  text-center"style="background-color: #f7765f !important; padding: 27px 0 !important;">
        <div class="container">
            <h2 style="    color: aliceblue;" class="title">Our Numbers</h2>
            <div class="row" style="color:aliceblue ">
                <div class="col-md-4">
                    <div class="card  card-plain" style="color:aliceblue ">
                        <div class="card-body">

                                <div class="author" style="color:aliceblue ">
                                    <h2 class="card-title" style="font-size:50px">{{ $videos_count }}</h2>
                                    <h4 class="card-category" style="color:aliceblue ">Videos</h4>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card  card-plain">
                        <div class="card-body">
                                <div class="author">
                                    <h2 class="card-title" style="font-size:50px">{{ $comments_count }}</h2>
                                    <h4 style="color:aliceblue " class="card-category">Comments</h4>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card  card-plain">
                        <div class="card-body">
                                <div class="author">
                                    <h2 class="card-title" style="font-size:50px">{{ $tags_count }}</h2>
                                    <h4 class="card-category" style="color:aliceblue ">Tags</h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contact-us')
    <div class="section landing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center">Keep in touch?</h2>
                    <form class="contact-form" action="{{ route('contact.store') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="nc-icon nc-single-02"></i>
                                  </span>
                                    </div>
                                    @php $input = "name" @endphp
                                    <input type="text" name="{{ $input }}" required class="form-control @error($input) is-invalid @enderror" placeholder="Name">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="nc-icon nc-email-85"></i>
                                  </span>
                                    </div>
                                    @php $input = "email" @endphp
                                    <input type="email" name="{{ $input }}" required class="form-control @error($input) is-invalid @enderror" placeholder="Email">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <label>Message</label>
                        @php $input = "message" @endphp
                        <textarea class="form-control @error($input) is-invalid @enderror" name="{{ $input }}" required rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
{{--    @include('layouts.footer')--}}
{{--    <div class="main">--}}

{{--        <footer class="footer footer-black  footer-white ">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <nav class="footer-nav">--}}

{{--                    </nav>--}}
{{--                    <div class="credits ml-auto">--}}
{{--            <span class="copyright">--}}
{{--              ©--}}
{{--              <script>--}}
{{--                document.write(new Date().getFullYear())--}}
{{--              </script>, made with <i class="fa fa-heart heart"></i> by Tohami--}}
{{--            </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
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

                function scrollToDownload() {

                    if ($('.section-download').length != 0) {
                        $("html, body").animate({
                            scrollTop: $('.section-download').offset().top
                        }, 1000);
                    }
                }
            });
        </script>

@endsection
