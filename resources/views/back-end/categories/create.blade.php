@extends('back-end.layout.app')
@php
    $moduleName = 'Category ';
    $pageTitle = $moduleName.' Create';
    $pag_des = 'Here You Can Create Categories';
@endphp

@section('title')
{{$pageTitle}}
@endsection


@section('content')


    @component('back-end.layout.navbar',['nav_title'=>$pageTitle]) @endcomponent

    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create {{$moduleName}}</h4>
                <p class="card-category">{{$pag_des}}</p>
            </div>
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="post">
                    @include('back-end.categories.form')

                    <button type="submit" class="btn btn-primary pull-right">Create {{$moduleName}}</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

@endsection


