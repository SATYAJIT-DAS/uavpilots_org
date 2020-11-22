@extends('layouts.admin.admin_layout')
@section('content')
<div id="content" class="flex ">
  <!-- ############ Main START-->
  <div>
    <div class="page-hero page-container " id="page-hero">
      <div class="padding d-flex">
        <div class="page-title">
          <h2 class="text-md text-highlight">Setting</h2>
          <small class="text-muted">Configure the things</small>
          <x-alert/>
        </div>
      </div>
    </div>
    <div class="page-content page-container" id="page-content">
      <div class="padding">
        <div id="accordion">
          <p class="text-muted">
            <strong>Account</strong>
          </p>
          <div class="card">
            <div class="d-flex align-items-center px-4 py-3 pointer" data-toggle="collapse" data-parent="#accordion" data-target="#c_1">
              <div>
                <span class="w-48 avatar circle bg-info-lt" data-toggle-class="loading">
                <img src="{{asset('storage/admin/images/'.Auth::guard('admin')->user()->image)}}" alt=".">
                </span>
              </div>
              <div class="mx-3 d-none d-md-block">
                <strong>{{$adminDetails->name}}</strong>
                <div class="text-sm text-muted">{{$adminDetails->email}}</div>
              </div>
              <div class="flex"></div>
              <div class="mx-3">
                <i data-feather="chevron-right"></i>
              </div>
              <div>
                <a href="{{route('admin.logout')}}" class="text-prmary text-sm">Sign Out</a>
              </div>
            </div>
            <div class="collapse p-4" id="c_1">
            <form role="form" action="{{route('admin.profile.img')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label>Profile picture</label>
                  <div class="custom-file">
                    <input type="file"  name="admin_img" id="admin_img" >
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Update</button>
              </form>
            </div>
            <div class="d-flex align-items-center px-4 py-3 b-t">
              <i data-feather="refresh-cw"></i>
              <div class="px-3">
                <div>Sync</div>
                <div class="text-sm text-muted">On - Sync everything</div>
              </div>
              <div class="flex"></div>
              <span>
                <label class="ui-switch ui-switch-md">
                  <input type="checkbox" checked>
                  <i></i>
                </label>
              </span>
            </div>
            <div class="d-flex align-items-center px-4 py-3 b-t pointer" data-toggle="collapse" data-parent="#accordion" data-target="#c_2">
              <i data-feather="lock"></i>
              <div class="px-3">
                <div>Password</div>
              </div>
              <div class="flex"></div>
              <div>
                <i data-feather="chevron-right"></i>
              </div>
            </div>
            <div class="collapse p-4" id="c_2">
            <form role="form" method="POST" action="{{url('/admin/update-pwd')}}">
              @csrf
                <div class="form-group">
                  <label>Old Password</label>
                  <input type="password" name="current_pwd" id="current_pwd" class="form-control">
                  <span class="chk_current_pwd"></span>
                </div>
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password"  name="new_pwd" class="form-control">
                </div>
                <div class="form-group">
                  <label>New Password Again</label>
                  <input type="password" name="confirm_new_pwd"  class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Update</button>
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
