@extends('back-end.layout.app')
@php
    $moduleName = 'Videos';
    $pageTitle = ' Edit' .$moduleName;
    $pag_des = 'Here You Can Edit Videos';
@endphp

@section('title')
    {{$pageTitle}}
@endsection


@section('content')


    @component('back-end.layout.navbar',['nav_title'=>$pageTitle])@endcomponent
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit {{$moduleName}}</h4>
                    <p class="card-category">{{$pag_des}}</p>
                </div>
                <div class="card-body">
                    <form action="{{route('videos.update',$row->id )}}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}

                        @include('back-end.videos.form')
                       <input type="hidden" name="user_id" value="{{$row->user_id}}">



                        <button type="submit" class="btn btn-primary pull-right">Update {{$moduleName}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="row">


                    @php
                        $url = getYoutubeId($row->youtube);
                    @endphp
                    @if($url)


                        <div class="col-md-12">
                            <iframe width="440" height="315" src="https://www.youtube.com/embed/{{$url}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                        </div>
                    @endif

                    <div class="col-md-12">
                        <img src="{{url('uploads/'.$row->image)}}" width="430" height="250" style="margin: 10px">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('back-end.comments.index')
        </div>

        <div class="col-md-4">
            @include('back-end.comments.create')

        </div>
    </div>


@endsection


