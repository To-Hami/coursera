{{csrf_field()}}
<div class="row">

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{isset($row)?$row->name:''}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Keywords</label>
            <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value=" {{isset($row)?$row->meta_keywords:''}}">
            @error('meta_keywords')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>



    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Page description</label>
            <textarea rows="6" name="des" class="form-control @error('des') is-invalid ">@enderror" >{{isset($row)?$row->des:''}}</textarea>
            @error('des')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>



    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta description</label>
            <textarea rows="5" name="meta_des" class="form-control @error('meta_des') is-invalid ">@enderror" >{{isset($row)?$row->meta_des:''}}</textarea>
            @error('meta_des')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>
