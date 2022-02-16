@extends('back-end.layout.app')
@php
    $moduleName = 'User ';
    $pageTitle = $moduleName.' Control';
    $pag_des = 'Here You Can Add / Edit / Delete Users';
@endphp

@section('title')
{{$pageTitle}}
@endsection


@section('content')


    @component('back-end.layout.navbar',['nav_title'=>$pageTitle]) @endcomponent

    <div class="card">
        <div class="card-header card-header-primary row">
            <div class="col-md-8">
                <h4 class="card-title ">{{$pageTitle}}</h4>
                <p class="card-category"> {{$pag_des}}</p>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{route('users.create')}}" class="btn btn-white btn-round">Add {{$moduleName}}</a>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <tr><th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Group
                        </th>
                        <th class="text-right">
                            Control
                        </th>

                    </tr></thead>
                    <tbody>
                    @foreach($rows as $row)
                    <tr>
                        <td>
                            {{$row->id}}
                        </td>
                        <td>
                            {{$row->name}}
                        </td>
                        <td>
                            {{$row->email}}
                        </td>
                        <td>
                            {{$row->group}}
                        </td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{$moduleName}} ">
                                <i class="material-icons">
                                    <a href="{{route('users.edit',$row->id)}}">   edit  </a>
                                </i>
                            </button>

                            <form action="{{route('users.destroy',$row->id)}}" method="post">

                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$moduleName}} ">
                                    <i class="material-icons">delete </i>
                                </button>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center" >

                    {!!$rows -> links()!!}

                </div>

            </div>
        </div>
    </div>

@endsection


