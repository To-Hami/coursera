@extends('back-end.layout.app')
@php
    $moduleName = 'Tags';
    $pageTitle = $moduleName.' Edit';
    $pag_des = 'Here You Can Edit Tags';
@endphp

@section('title')
{{$pageTitle}}
@endsection


@section('content')


    @component('back-end.layout.navbar',['nav_title'=>$pageTitle]) @endcomponent

    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit {{$moduleName}}</h4>
                <p class="card-category">{{$pag_des}}</p>
            </div>
            <div class="card-body">
                <form action="{{route('tags.update',$row->id )}}" method="POST">
                    {{method_field('PUT')}}

                    @include('back-end.tags.form')

                    <button type="submit" class="btn btn-primary pull-right">Update  {{$moduleName}}</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>


@endsection


