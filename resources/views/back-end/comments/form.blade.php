{{csrf_field()}}
<div class="row">

    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Write a comment</label>
            <textarea  name="comment" class="form-control @error('comment') is-invalid @enderror"></textarea>
            @error('comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>
