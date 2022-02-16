@extends('back-end.layout.app')
@section('header')
    home
@endsection
@section('title')
    dashboard
@endsection
@section('content')

 @component('back-end.layout.navbar',['nav_title'=>'Dashboard ']) @endcomponent

 @include('back-end.home-sections.statics')
 @include('back-end.home-sections.latest-comments')


@endsection
