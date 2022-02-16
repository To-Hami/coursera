@extends('back-end.layout.app')
@php
    $moduleName = 'Messages';
    $pageTitle = $moduleName.' Edit';
    $pag_des = 'Here You Can Edit messages';
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
                <div class="row">
                    @php $input = "name"; @endphp
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Category Name</label>
                            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                                   class="form-control @error($input) is-invalid @enderror">
                            @error($input)
                            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
                            @enderror
                        </div>
                    </div>
                    @php $input = "email"; @endphp
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}"
                                   class="form-control @error($input) is-invalid @enderror">
                            @error($input)
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
             </span>
                            @enderror
                        </div>
                    </div>
                    @php $input = "message"; @endphp
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Message</label>
                            <textarea name="{{ $input }}" cols="30" rows="5"
                                      class="form-control @error($input) is-invalid @enderror">{{ isset($row) ? $row->{$input} : '' }}</textarea>
                            @error($input)
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>

                <h4>Replay On Message</h4>

                <br>

                <form action="{{ route('message.replay' ,$row->id) }}" method="post">
                    {{ csrf_field() }}
                    @php $input = "message"; @endphp
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Message</label>
                            <textarea name="{{ $input }}" cols="30" rows="5"
                                      class="form-control @error($input) is-invalid @enderror"></textarea>
                            @error($input)
                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Replay Message</button>
                    <div class="clearfix"></div>
                </form>

            </div>
        </div>
    </div>
@endsection
