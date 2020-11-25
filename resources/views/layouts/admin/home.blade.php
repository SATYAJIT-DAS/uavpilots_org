@extends('layouts.admin.admin_layout')
@section('content')
<!-- ############ Content START-->
<div id="content" class="flex ">
  <!-- ############ Main START-->
  <div>
    <div class="page-hero page-container " id="page-hero">
      <div class="padding d-flex">
        <div class="page-title">
          <h2 class="text-md text-highlight">Dashboard</h2>
          <small class="text-muted">Welcome aboard,
            <strong>{{$adminDetails->name}}</strong>
          </small>
        </div>
        <div class="flex"></div>
      </div>
    </div>
    <div class="page-content page-container" id="page-content">
      <div class="padding">
        <div class="row row-sm sr">
            <div class="col-12">
                <h2 class="text-md text-highlight p-2 mb-2">Pending Approval  List</h2>
            </div>
          <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover waiting-approval-user-data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Industry</th>
                                <th>Country</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>

        </div>
        <div class="row row-sm sr">
            <div class="col-12">
                <h2 class="text-md text-highlight p-2 mb-2">Active User List</h2>
            </div>
          <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover active-user-data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Industry</th>
                                <th>Country</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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
