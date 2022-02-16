{{csrf_field()}}

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{isset($row)?$row->name:''}}">
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
                <input type="text" name="meta_keywords" class="form-control @error('name') is-invalid @enderror"
                       value=" {{isset($row)?$row->meta_keywords:''}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6" style="margin: 20px 2px ">
            <div class="">
                <label class="">Video Image </label>
                <input type="file" name="image" class=""
                       value=" {{isset($row)?$row->image:''}}">
                @error('image')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Youtube Url</label>
                <input type="url" name="youtube" class="form-control @error('name') is-invalid @enderror"
                       value=" {{isset($row)?$row->youtube:''}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Video Statues </label>
                <select name="published" class="form-control @error('published') is-invalid @enderror">
                    <option style="background-color: #202940 "
                            value="1" {{isset($row) && $row->published == 1 ?'selected':''}}>published
                    </option>
                    <option style="background-color: #202940 "
                            value="0" {{isset($row) && $row->published == 0 ?'selected':''}}>hidden
                    </option>

                </select>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Video category </label>
                <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                    @foreach($categories as $category)
                        <option style="background-color: #202940 "
                                value="{{$category->id}}" {{isset($row) && $row->published == 1 ?'selected':''}}>{{$category->name}}</option>
                    @endforeach

                </select>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Page description</label>
                <textarea rows="6" name="des"
                          class="form-control @error('name') is-invalid ">@enderror" >{{isset($row)?$row->des:''}}</textarea>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Meta description</label>
                <textarea rows="2" name="meta_des"
                          class="form-control @error('name') is-invalid ">@enderror" >{{isset($row)?$row->meta_des:''}}</textarea>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"> Skills </label>
                <select name="skills[]" class="form-control @error('skills') is-invalid @enderror" multiple
                        style=" height: 70px ">
                    @foreach($skills as $skill)
                        <option style="background-color: #202940 "
                                value="{{$skill->id}}" {{in_array($skill->id,$selectedSkills)?'selected':''}}>{{$skill->name}}</option>
                    @endforeach

                </select>
                @error('skills')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"> Tags </label>
                <select name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple
                        style=" height: 70px ">
                    @foreach($tags as $tag)
                        <option style="background-color: #202940 "
                                value="{{$tag->id}}"{{in_array($tag->id,$selectedStags)?'selected':''}} >{{$tag->name}}</option>
                    @endforeach

                </select>
                @error('tags')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>


    </div>

</div>


