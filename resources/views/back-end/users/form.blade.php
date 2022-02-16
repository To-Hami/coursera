{{csrf_field()}}
<div class="row">

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
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
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{isset($row)?$row->email:''}}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password </label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Group </label>
            <select name="group" style="background-color: #1a2035" class="form-control  @error('group') is-invalid @enderror">
                <option value="admin"{{isset($row) && $row->group == 'admin'  ?  'selected':''}}>admin</option>
                <option value="user"{{isset($row) && $row->group == 'user' ? 'selected' : ''}}>user</option>

            </select>
{{--            <input>--}}
{{--            @error('group')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </span>--}}
{{--            @enderror--}}
        </div>
    </div>
</div>
