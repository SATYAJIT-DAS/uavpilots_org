

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
                 <x-alert/>
                <div id="content-body">
                    <div class="p-3 p-md-5"> 
                    <form class="" role="form" action="{{ route('admin.updatepagesettings') }}" enctype="multipart/form-data" method="POST" >
                        @csrf
                        <label>Change Homepage Banner</label>
                        <div class="avatar-wrapper avatar-wrapper-fix">
                            @if (!empty($pageSettings->home_image))
                                <img src="{{asset('img/homepage/'.$pageSettings->home_image)}}" class="img-fluid profile-pic" alt="Responsive image">
                            @endif
                            <div class="upload-button">
                                <i data-feather='upload'></i>
                            </div>
                            <input class="file-upload" class="form-control" type="file" accept="image/*" name="home_image" id="image" hidden/>
                        </div>

                        <div class="form-group">
                            <label>Home Page Description</label>
                           <!--  <input  name="home_description" type="url" class="form-control" placeholder="Enter Facebook link" value="{{!empty($pageSettings->home_description)?$pageSettings->home_description :''}}" > -->

                            <textarea class="form-control" id="home_description" rows="3" name="home_description" required>{{!empty($pageSettings->home_description)?$pageSettings->home_description :''}}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Facebook Link</label>
                            <input  name="fb_link" type="url" class="form-control" placeholder="Enter Facebook link" value="{{!empty($pageSettings->fb_link)?$pageSettings->fb_link :''}}" >
                        </div>
                        <div class="form-group">
                            <label>Twitter Link</label>
                            <input  name="twitter_link" type="url" class="form-control" placeholder="Enter Twitter link" value="{{!empty($pageSettings->twitter_link) ?$pageSettings->twitter_link:'' }}">
                        </div>
                        <div class="form-group">
                            <label>Instagram Link</label>
                            <input  name="instragram_link" type="url" class="form-control" placeholder="Enter Instragram link" value="{{!empty($pageSettings->instragram_link)?$pageSettings->instragram_link:''}}">
                        </div>



                        <!-- <div class="form-group"> 
                                
                        </div> -->
                        <button type="submit" class="btn btn-primary mb-4">Update Settings</button>
                    </form>



                    <div class="container mt-4">


                        <h4>Industry list</h4>

                        <table class="table table-hover industry-list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Industry</th>
                                    <th>Action</th> 
                                    
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        

                    </div>
                    
                    <div class="container mt-5">

                        <h2 class="mt-3">Add new industry:</h2>
    
                        <div class="form-group">
                            <label>Industry Name:</label>
                            <input type="text" name="industry_name" class="form-control" id="industry_name">
                        </div>
                        <button class="btn btn-primary add-new-industry"> Add new industry</button>

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
