


@extends('layouts.admin.admin_layout')

@section('content')


<style type="text/css">
	



</style>


<div class="container">

<div class="col-10 d-flex justify-content-center">

    <form class="well form-horizontal col-11" action="{{ route('admin.updateuser', $usersdata->id) }}" method="POST" enctype="multiport"  id="contact_form">
    	@csrf
<fieldset>

<!-- Form Name -->
<legend><h2><b>{{$usersdata->first_name}} {{$usersdata->last_name}}</b></h2></legend><br>


<div class="avatar-wrapper">
	<img class="profile-pic" src="{{$usersdata->image}}" />
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
 <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="{{$usersdata->first_name}}">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-8 control-label">Last Name</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text" value="{{$usersdata->last_name}}">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-8 control-label" >Description</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
    	<textarea class="form-control" id="description" rows="3" name="description">{{$usersdata->description}}</textarea>
	</div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 control-label" >State</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="state" class="form-control"  type="text" value="{{$usersdata->state}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 control-label" >Country</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="country" class="form-control"  type="text" value="{{$usersdata->country}}">
    </div>
  </div>
</div>


  <div class="form-group"> 
  <label class="col-md-8 control-label">Industry</label>
    <div class="col-md-8 selectContainer">
    <div class="input-group">
        <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span> -->
    <select name="industry" class="form-control selectpicker">
      <option value="">Choose</option>
      <option>Department of Engineering</option>
      <option>Department of Agriculture</option>
      <option >Accounting Office</option>
      <option >Tresurer's Office</option>
      <option >MPDC</option>
      <option >MCTC</option>
      <option >MCR</option>
      <option >Mayor's Office</option>
      <option selected value="{{$usersdata->industry}}">{{$usersdata->industry}}</option>
    </select>
  </div>
</div>
</div>


<!-- Text input-->

<!-- <div class="form-group">
  <label class="col-md-8 control-label">Username</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="username" placeholder="Username" class="form-control"  type="text" value="">
    </div>
  </div>
</div> -->

<div class="form-group">
  <label class="col-md-8 control-label" >Facebook Link</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="fb_link" class="form-control"  type="text" value="{{$usersdata->fb_link}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 control-label" >Twitter Link</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="twitter_link" class="form-control"  type="text" value="{{$usersdata->twitter_link}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-8 control-label" >Youtube Link</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="youtube_link" class="form-control"  type="text" value="{{$usersdata->youtube_link}}">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-8 control-label" >Instagram Link</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
  <input name="instagram_link" class="form-control"  type="text" value="{{$usersdata->instagram_link}}">
    </div>
  </div>
</div>

<!-- Text input-->







<!-- <div class="form-group">
    
    <div class="input-group">
    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	</div>
  </div> -->
  

<!-- Text input-->



<!-- Text input-->
 




<!-- Button -->
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

