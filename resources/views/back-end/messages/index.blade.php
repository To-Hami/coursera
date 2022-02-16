@extends('back-end.layout.app')
@php
    $moduleName = 'Messages';
    $pageTitle = $moduleName.' Control';
    $pag_des = 'Here You Can Edit or Remove Messages';
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
{{--            <div class="col-md-4 text-right">--}}
{{--                <a href="{{route('categories.create')}}" class="btn btn-white btn-round">Add {{$moduleName}}</a>--}}

{{--            </div>--}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            email
                        </th>
                        <th>
                            message
                        </th>
                        <th class="text-right">
                            control
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>
                                {{ $row->id }}
                            </td>
                            <td>
                                {{ $row->name }}
                            </td>
                            <td>
                                {{ $row->email }}
                            </td>
                            <td>
                                {{ $row->message }}
                            </td>
                            <td class="td-actions text-right">
                                <a href="{{ route('messages.edit' , $row->id) }}" rel="tooltip"
                                   title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Message">
                                    <i class="material-icons">edit</i>
                                </a>

                                <form action="{{ route('messages.destroy' ,$row->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm"
                                            data-original-title="Remove Message">
                                        <i class="material-icons">close</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $rows->links() !!}
            </div>

        </div>
    </div>
    </div>

@endsection
