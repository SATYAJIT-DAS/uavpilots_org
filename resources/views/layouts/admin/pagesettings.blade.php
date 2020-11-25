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
                    <form class="" role="form" action="#" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Facebook Link</label>
                            <input  name="fb_link" type="url" class="form-control" placeholder="Enter Facebook link">
                        </div>
                        <div class="form-group">
                            <label>Twitter Link</label>
                            <input  name="fb_link" type="url" class="form-control" placeholder="Enter Twitter link">
                        </div>
                        <div class="form-group">
                            <label>Instragram Link</label>
                            <input  name="fb_link" type="url" class="form-control" placeholder="Enter Instragram link">
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
