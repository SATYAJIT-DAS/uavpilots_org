@extends('layouts.app')
@section('content')

<div class="flex">
  <div class="w-xl w-auto-sm mx-auto py-5">
    <div class="p-4 d-flex flex-column h-100">
      <!-- brand -->
      <a href="{{url('/')}}" class="navbar-brand align-self-center">
        <!-- <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
          <g class="loading-spin" style="transform-origin: 256px 256px">
            <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
          </g>
        </svg> -->
        <img src="{{asset('/img/droners.png')}}" alt="" srcset="">
        {{-- <img src="../img/droners.png" alt="..."> --}}
    <!-- <span class="hidden-folded d-inline l-s-n-1x align-self-center">{{config('app.name')}}</span> -->
      </a>
      <!-- / brand -->
    </div>
    <div class="card">
      <div id="content-body">
        <div class="p-3 p-md-5">
          <h5>Welcome </h5>
          <p>
          <small class="text-muted">Register to {{config('app.name')}}</small>
          </p>
          <x-alert/>
          <form role="form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data"  data-plugin="parsley" data-option="{}">
            @csrf
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Phone number:</label>
                <input type="number" name="phone_number" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Enter password:</label>
                <input type="password" name="password" class="form-control" required id="pwd">
            </div>
            <div class="form-group">
                <label>Confirm password:</label>
                <input type="password" name="password_confirmation" class="form-control" data-parsley-equalto="#pwd" required>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="">First Name:</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Last Name:</label>
                    <input type="text" class="form-control"  name="last_name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="">Country:</label>
                    <input type="text" class="form-control"  name="country" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">State:</label>
                    <input type="text" class="form-control"  name="state" required>
                </div>
            </div>

            <div class="form-row mb-3">
                <label for="">Industry:</label>
                  <div class="input-group mb-3">
                    <select class="custom-select" id="industry" name="industry" required>
                        <option selected value="">Choose...</option>
                        @foreach ($industry_names as $industry_name)
                            <option value="{{$industry_name}}">{{$industry_name}}</option>
                        @endforeach
                    </select>
                  </div>

            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control usernamefield" required data-parsley-usernamevalidator data-parsley-trigger="focusout">
            </div>

            <div class="form-row mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
            </div>

            <div class="form-row mb-3">
              <label>Upload Photo:</label>
              <div class="custom-file mb-3 form-control">
                <label class="custom-file-label photouploadinput" for="customFile">Choose file</label>
                <input type="file" class="custom-file-input form-control photouploadinput" id="customFile" name="user_image" required data-parsley-max-file-size="6" >
              </div>
            </div>
            <div class="form-group">
                <label>Add Website:</label>
                <input type="url" name="website" class="form-control" required >
            </div>

            <div class="form-row mb-4">
                <label for="">Your Facebook Profile Link(optional)</label>
                <input type="url" class="form-control"  class="form-control" name="fb_link" data-parsley-type="url">
            </div>

            <div class="form-row mb-4">
                <label for="">Your Twitter Profile Link(optional)</label>
                <input type="url" class="form-control"  name="twitter_link" data-parsley-type="url">
            </div>

            <div class="form-row mb-4">
                <label for="">Your Youtube Profile Link(optional)</label>
                <input type="url" class="form-control"  name="youtube_link" data-parsley-type="url">
            </div>

            <div class="form-row mb-4">
                <label for="">Your Instagram Profile Link(optional)</label>
                <input type="url" class="form-control"  name="instagram_link" data-parsley-type="url">
            </div>
            <button type="submit" class="btn btn-primary mb-4"> {{ __('Sign Up') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

