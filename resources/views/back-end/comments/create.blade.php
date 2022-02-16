<form action="{{route('comments.store')}}" method="post">
    @include('back-end.comments.form')
    <input class="form-control" type="hidden" name="video_id" value="{{$row->id}}">
    <button type="submit" class="btn btn-primary pull-right">Create Comment</button>
    <div class="clearfix"></div>
</form>



