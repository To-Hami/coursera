@extends('layouts.app')

@section('title' , $video->name)

@section('meta_keywords' , $video->meta_keywords)

@section('meta_des' , $video->meta_des)

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{ $video->name}}</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php $url = getYoutubeId($video->youtube) @endphp
                    @if($url)
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}"
                                style="margin-bottom: 20px" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-user-run"></i> : {{ $video->user->name }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-calendar-60"></i> :  {{ $video->created_at }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-single-copy-04"></i> :    <a
                                    href="{{ route('front.category' ,  $video->cat->id ) }}">
                            {{ $video->cat->name }}
                        </a>
                        </span>
                    </p>
                    <p>
                        {{ $video->des }}
                    </p>
                </div>
                <div class="col-md-3">
                    <h6>Tags</h6>
                    <p>
                        @foreach ($allTags as $theTag)

                            <a href="{{ route('front.tags' ,$theTag->id) }}">
                                <span class="badge badge-pill badge-primary">{{ $theTag->name }}</span>
                            </a>
                        @endforeach

                    </p>
                </div>
                <div class="col-md-3">
                    <h6>Skills</h6>
                    <p>
                       @foreach ($allSkills as $theSkill)
                        <a href="{{ route('front.skill' , $theSkill->id) }}">
                                <span class="badge badge-pill badge-info">{{ $theSkill->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
            <br><br>
            @include('front-end.video.comments')
            @include('front-end.video.create-comment')
        </div>
    </div>
@endsection
@section('footer')
    <div class="main">

        <footer class="footer footer-black  footer-white ">
            <div class="container">
                <div class="row">
                    <nav class="footer-nav">

                    </nav>
                    <div class="credits ml-auto">
            <span class="copyright">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="fa fa-heart heart"></i> by Tohami
            </span>
                    </div>
                </div>
            </div>
        </footer>
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
