<?php
$moduleName = 'Comments';
$pag_des = 'Here You Can Control Your  Comments';
?>
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Edit {{$moduleName}}</h4>
        <p class="card-category">{{$pag_des}}</p>
    </div>
    <div class="card-body">

        <table class="table">
            <tbody>


            @foreach( $comments as $comment)

                <tr>
                    <td>
                            <div class="row">
                                <div class="col-md-8">
                                    <p>{{$comment->comment}}</p>
                                    <p>{{$comment->user->name}}</p>
                                    <small>{{$comment->created_at}}</small>

                                </div>
                                <div class="col-md-4">

                                    <a href="{{route('comment.delete',['id' => $comment->id])}}" class="btn btn-white btn-link btn-sm"
                                            data-original-title="Remove">
                                        <i class="material-icons">close</i>
                                    </a>

                                </div>

                            </div>


{{--                        <form action="{{route('comment.update',['id', $comment->id])}}" method="post">--}}
{{--                            @include('back-end.comments.form')--}}
{{--                            <input class="form-control" type="hidden" name="video_id" value="{{$row->id}}">--}}
{{--                            <button type="submit" class="btn btn-primary pull-right">Update  Comment</button>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </form>--}}







                    </td>


                </tr>
            @endforeach


            </tbody>
        </table>


    </div>
</div>












