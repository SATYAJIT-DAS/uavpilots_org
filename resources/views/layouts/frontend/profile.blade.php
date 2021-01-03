@extends('layouts.frontend.frontend_layout')
@section('content')
{{-- <div class="page-content page-container" id="page-content">
    <div class="padding"> --}}
        <div class="container-fluid">
            <div class="row">
            <div class="col-12 col-md-6">
                <div class="col">
                    <div class="block p-md-3 ">
                        @if (empty($userdata->user_image))
                            <img src="{{ asset('img/talking-3.jpg') }}" class="img-fluid banner-img" alt="Responsive image">
                        @else
                            <img src="{{asset('storage/users/images/'.$userdata->user_image)}}" class="img-fluid banner-img" alt="Responsive image">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 ">
                <div class="col-12 mt-5">
                <h1 class="font-40 text-center">{{$userdata->first_name.' '.$userdata->last_name }}</h1>
                </div>
                @if (!empty($userdata->youtube_link))
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <a target="_blank" href="{{$userdata->youtube_link}}" class="btn btn-primary rounded-pill p-3">Visit my channel</a>
                    </div>
                @endif
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <p class="p-3 font-22"> {{$userdata->description}}</p>
                </div>
                <div class="col-12 mt-2">
                    @if (!empty($userdata->country))
                        <p class="pl-3 font-22"><strong>Location </strong>: {{$userdata->state}} ,{{$userdata->country}}</p>
                    @endif
                    @if (!empty($userdata->industry))
                        <p class="pl-3 font-22"><strong>Industry </strong>: {{$userdata->industry}} </p>
                    @endif
                </div>
                <div class="col-12">
                    <ul class="list-unstyled list-inline text-center">
                        @if (!empty($userdata->fb_link))
                            <li class="list-inline-item">
                                <a class="font-22" target="_blank" href="{{$userdata->fb_link}}">
                                    <i data-feather='facebook' style="width: 40px; height: 40px"></i>
                                </a>
                            </li>
                        @endif
                        @if (!empty($userdata->twitter_link))
                            <li class="list-inline-item">
                                <a class="font-22" target="_blank" href="{{$userdata->twitter_link}}">
                                    <i data-feather='twitter' style="width: 40px; height: 40px"></i>
                                </a>
                            </li>
                        @endif
                        @if (!empty($userdata->instagram_link))
                            <li class="list-inline-item">
                                <a class="font-22" target="_blank" href="{{$userdata->instagram_link}}">
                                    <i data-feather='instagram' style="width: 40px; height: 40px"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            </div>
        </div>
    {{-- </div>

</div> --}}

@endsection
