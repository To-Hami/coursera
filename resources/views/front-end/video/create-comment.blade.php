@if(auth()->user())
    <form action="{{route('front.commentStore' , ['id' =>$video->id  ])}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Add Comment</label>
            <textarea name="comment" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn  btn-default" style="
                                  background-color: #f7765f;
                                  padding: 10px;color: #ffffff;
                                  border-radius: 11px;margin: 12px 0px;
                                  display: block;max-width: 120px;
                                  text-align: center;cursor: pointer;">
            Add Comment
        </button>
    </form>
@endif
