@extends('layouts.app')
@section('content')
<div class="container">
<div class="col-10 d-flex justify-content-center">
    <form class="well form-horizontal col-11" action="{{ route('user.editProfile', $userdata->id) }}" method="POST" enctype="multipart/form-data"  data-plugin="parsley" data-option="{}">
    	@csrf
      <fieldset>

<!-- Form Name -->
    <legend>
      <h2><b>{{$userdata->first_name}} {{$userdata->last_name}}</b>
      </h2>
    </legend>
  <div class="avatar-wrapper">
  	<img class="profile-pic" src="{{$userdata->image ?? asset('images/default-avatar.png')}}" alt="Update Profile Picture" />
  	<div class="upload-button">
  		<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
  	</div>
  	<input class="file-upload" type="file" accept="image/*" name="image" id="image" />
  </div>

<!-- Text input-->

  <div class="form-group">
    <label class="col-md-8 control-label">First Name</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
    <input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="{{$userdata->first_name}}" required>
      </div>
    </div>
  </div>

<!-- Text input-->

  <div class="form-group">
    <label class="col-md-8 control-label">Last Name</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
    <input name="last_name" placeholder="Last Name" class="form-control"  type="text" value="{{$userdata->last_name}}" required>
      </div>
    </div>
  </div>


  <div class="form-group">
    <label class="col-md-8 control-label">Username</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
    <input name="username" placeholder="Username" class="form-control"  type="text" value="{{$userdata->username}}" required>
      </div>
    </div>
  </div>
  <hr>

  <div class="form-group">
    
      <div class="col-md-8 inputGroupContainer">
        <div class="input-group">
          <button class="btn btn-primary changepass">Change Password &#x25bc;</button>
        </div>
      </div>
  </div>


  <div class="form-group passchangeinput" style="display: none;">
    <label class="col-md-8 control-label">Current Password</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
    <input name="state" class="form-control"  type="password">
      </div>
    </div>
  </div>

  <div class="form-group passchangeinput" style="display: none;">
    <label class="col-md-8 control-label">Add New Password</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
    <input name="password_confirmation" class="form-control" class="form-control" type="password" id="pwd">
      </div>
    </div>
  </div>

  <div class="form-group passchangeinput" style="display: none;">
    <label class="col-md-8 control-label">Confirm New Password</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
    <input name="state" class="form-control"  type="password" data-parsley-equalto="#pwd">
      </div>
    </div>
  </div>



<hr>





  <div class="form-group">
    <label class="col-md-8 control-label" >Description</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
      	<textarea class="form-control" id="description" rows="3" name="description" required>{{$userdata->description}}</textarea>
  	</div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-8 control-label" >State</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
    <input name="state" class="form-control"  type="text" value="{{$userdata->state}}" required>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-8 control-label" >Country</label>
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
    <input name="country" class="form-control"  type="text" value="{{$userdata->country}}" required>
      </div>
    </div>
  </div>


  <div class="form-group">
      <label class="col-md-8 control-label">Industry</label>
        <div class="col-md-8 selectContainer">
          <div class="input-group">

            <select name="industry" class="form-control selectpicker" required>
              <option value="">Choose</option>
              <option>Department of Engineering</option>
              <option>Department of Agriculture</option>
              <option >Accounting Office</option>
              <option >Tresurer's Office</option>
              <option >MPDC</option>
              <option >MCTC</option>
              <option >MCR</option>
              <option >Mayor's Office</option>
              <option selected value="{{$userdata->industry}}">{{$userdata->industry}}</option>
            </select>
        </div>
    </div>
  </div>


<div class="form-group">
  <label class="col-md-8 control-label" >Facebook Link</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <input name="fb_link" class="form-control"  type="text" value="{{$userdata->fb_link}}" required>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 control-label" >Twitter Link</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <input name="twitter_link" class="form-control"  type="text" value="{{$userdata->twitter_link}}" >
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 control-label" >Youtube Link</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <input name="youtube_link" class="form-control"  type="text" value="{{$userdata->youtube_link}}">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-8 control-label" >Instagram Link</label>
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <input name="instagram_link" class="form-control"  type="text" value="{{$userdata->instagram_link}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 control-label"></label>
  <div class="col-md-8">
  	<button type="submit" class="btn btn-warning" >SUBMIT</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->

</div>

@endsection
