@extends('layouts.admin.admin_layout')
@section('content')
<div class="container">
<div class="col-12 d-flex justify-content-center">
    <form class="col-12" action="{{ route('admin.updateuser', $userdata->id) }}" method="POST" enctype="multipart/form-data" id="contact_form">
    	@csrf
      <fieldset>

<!-- Form Name -->
    <legend>
      <h2><b>{{$userdata->first_name}} {{$userdata->last_name}}</b>
      </h2>
    </legend>
  <div class="avatar-wrapper">
  	<img class="profile-pic" src="{{$userdata->image}}" />
  	<div class="upload-button">
  		<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
  	</div>
  	<input class="file-upload" type="file" accept="image/*" name="image" id="image" />
  </div>

<!-- Text input-->

  <div class="form-group">
    <label class="col-md-12 control-label">First Name</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
    <input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="{{$userdata->first_name}}">
      </div>
    </div>
  </div>

<!-- Text input-->

  <div class="form-group">
    <label class="col-md-12 control-label">Last Name</label>
      <div class="col-md-12 inputGroupContainer">
      <div class="input-group">
    <input name="last_name" placeholder="Last Name" class="form-control"  type="text" value="{{$userdata->last_name}}">
      </div>
    </div>
  </div>


  <div class="form-group">
    <label class="col-md-12 control-label" >Description</label>
      <div class="col-md-12 inputGroupContainer">
      <div class="input-group">
      	<textarea class="form-control" id="description" rows="3" name="description">{{$userdata->description}}</textarea>
  	</div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-12 control-label" >State</label>
      <div class="col-md-12 inputGroupContainer">
      <div class="input-group">
    <input name="state" class="form-control"  type="text" value="{{$userdata->state}}">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-12 control-label" >Country</label>
      <div class="col-md-12 inputGroupContainer">
      <div class="input-group">
    <input name="country" class="form-control"  type="text" value="{{$userdata->country}}">
      </div>
    </div>
  </div>


  <div class="form-group">
      <label class="col-md-12 control-label">Industry</label>
        <div class="col-md-12 selectContainer">
          <div class="input-group">

            <select name="industry" class="form-control selectpicker">
              <option value="">Choose</option>
              <option value="car">Car racing</option>
              <option value="automobile">Automobile</option>
              <option value="photography">Photography</option>
              <option selected value="{{$userdata->industry}}">{{$userdata->industry}}</option>
            </select>
        </div>
    </div>
  </div>


<div class="form-group">
  <label class="col-md-12 control-label" >Facebook Link</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="fb_link" class="form-control"  type="text" value="{{$userdata->fb_link}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" >Twitter Link</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="twitter_link" class="form-control"  type="text" value="{{$userdata->twitter_link}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" >Youtube Link</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="youtube_link" class="form-control"  type="text" value="{{$userdata->youtube_link}}">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" >Instagram Link</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="instagram_link" class="form-control"  type="text" value="{{$userdata->instagram_link}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label"></label>
  <div class="col-md-12">
  	<button type="submit" class="btn btn-success" >SUBMIT</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->

</div>

@endsection
