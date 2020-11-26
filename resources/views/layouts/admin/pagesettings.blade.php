@extends('layouts.admin.admin_layout')
@section('content')


<!-- ############ Content START-->
<div id="content" class="flex ">
  <!-- ############ Main START-->
  <div>
    <div class="page-hero page-container " id="page-hero">
      <div class="padding d-flex">
        <div class="page-title">
        </div>
        <div class="flex"></div>
      </div>
    </div>
    <div class="page-content page-container" id="page-content">
      <div class="padding">
            <div class="card">
                <div id="content-body">
                    <div class="p-3 p-md-5">
                    <form class="" role="form" action="{{ route('admin.updatepagesettings') }}" enctype="multipart/form-data" method="POST" data-plugin="parsley" data-option="{}">
                        @csrf



                        <div class="avatar-wrapper">
                            <img src="{{asset('img/'.$pageSettings->home_image)}}" class="img-fluid profile-pic" alt="Responsive image">
                            <div class="upload-button">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload" class="form-control" type="file" accept="image/*" name="home_image" id="image" hidden data-parsley-validate data-parsley-trigger="change"/>
                        </div>


                        <div class="form-group">
                            <label>Facebook Link</label>
                            <input  name="fb_link" type="url" class="form-control" placeholder="Enter Facebook link" value="{{$pageSettings->fb_link}}" data-parsley-trigger="focusout">
                        </div>
                        <div class="form-group">
                            <label>Twitter Link</label>
                            <input  name="twitter_link" type="url" class="form-control" placeholder="Enter Twitter link" value="{{$pageSettings->twitter_link}}">
                        </div>
                        <div class="form-group">
                            <label>Instagram Link</label>
                            <input  name="instragram_link" type="url" class="form-control" placeholder="Enter Instragram link" value="{{$pageSettings->instragram_link}}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Update Settings</button>
                    </form>
                    </div>
                </div>
                </div>
      </div>
    </div>
  </div>
  <!-- ############ Main END-->
</div>
<!-- ############ Content END-->
@endsection
