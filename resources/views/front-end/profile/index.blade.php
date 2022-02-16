@extends('layouts.app')

@section('title' , $user->name)

@section('content')

    <div class="section profile-content" style="margin-top: 190px">
        <div class="container">
            <div class="owner">
                <div class="avatar">
                    <img src="/frontend/img/faces/clem-onojeghuo-3.jpg" alt="Circle Image"
                         class="img-circle img-no-padding img-responsive">
                </div>
                <div class="name">
                    <h4 class="title">{{ $user->name }}
                        <br>
                    </h4>
                    <h4 class="title">
                        This is  the best Place To learn Programing Thanks ^_^
                        <br>
                    </h4>
                    <h6 class="description">
                        {{ $user->email }}
                    </h6>
                </div>
            </div>
            @if(auth()->user() && $user->id == auth()->user()->id)
                <br>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center" style="">
                        <btn  onclick="$('#profileCard').slideToggle(500)" class="btn btn-outline-default btn-round" style="background-color: #f7765f;
    color: aliceblue;
    border-color: aliceblue;"><i class="fa fa-cog" style=""></i> Update Profile</btn>
                    </div>
                </div>

                @include('front-end.profile.edit')
            @endif
        </div>
    </div>
@endsection

