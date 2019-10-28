<div class="row form-group">
        <label for="" class="col-form-label col-md-3 text-right">First Name</label>
        <div class="col-md-8">
            <input type="text" name="first_name" class="form-control" value="{{$user->profile->first_name}}">
        </div>
    </div>
    <div class="row form-group">
        <label for="" class="col-form-label col-md-3 text-right">Middle Name</label>
        <div class="col-md-8">
            <input type="text" name="middle_name" class="form-control" value="{{$user->profile->middle_name}}">
        </div>
    </div>
    <div class="row form-group">
        <label for="" class="col-form-label col-md-3 text-right">Last Name</label>
        <div class="col-md-8">
            <input type="text" name="last_name" class="form-control" value="{{$user->profile->last_name}}">
        </div>
    </div>
    @if($user->role->name=="student")
    <div class="row form-group">
        <label for="" class="col-form-label col-md-3 text-right">Level</label>
        <div class="col-md-8">
            <input type="text" name="level" class="form-control" value="{{$user->profile->level}}">
        </div>
    </div>
    @endif
    <div class="row form-group">
        @if($user->role->name=="student")
            <label for="" class="col-form-label col-md-3 text-right">Matric Number</label>
            <div class="col-md-8">
                <input type="text" name="mat_no" class="form-control" value="{{$user->profile->mat_no}}">
            </div>
        @elseif($user->role->name=="staff")
            <label for="" class="col-form-label col-md-3 text-right">Employee Number</label>
            <div class="col-md-8">
                <input type="text" name="employment_no" class="form-control" value="{{$user->profile->employment_no}}">
            </div>
        @endif
    </div>
    <div class="row form-group">
        <div class="col-md-8 offset-md-3">
            <input type="submit" value="Update Profile" class="btn btn-primary">
        </div>
        
    </div>