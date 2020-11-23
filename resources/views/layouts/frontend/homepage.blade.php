@extends('layouts.frontend.frontend_layout')
@section('content')
    <div class="page-content page-container" id="page-content">
        <section class="slider position-relative">
        <div class="padding">
            <div class="block p-md-3 ">
                <div id="carouselCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="media media-16x9 gd-primary">
                            <div class="media-content" style="background-image:url({{ asset('img/talking.jpg') }})"></div>
                            </div>
                            <div class="carousel-caption text-align-auto">
                                <span class="badge badge-outline">FEATURED</span>
                                <h2 class="text-white display-5 font-weight-500 my-4">The world’s most popular framework </h2>
                                <p class="text-fade d-none d-md-block">For building responsive, mobile-first sites, with BootstrapCDN and a template starter page.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="media media-16x9 gd-info">
                            <div class="media-content" style="background-image:url({{ asset('img/talking-2.jpg') }})"></div>
                            </div>
                            <div class="carousel-caption text-align-auto">
                                <span class="badge badge-outline">POPULAR</span>
                                <h2 class="text-white display-5 font-weight-500 my-4">Popular front-end library.</h2>
                                <p class="text-fade d-none d-md-block">Quickly prototype your ideas or build your entire app with prebuilt components.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="media media-16x9 gd-dark">
                            <div class="media-content" style="background-image:url({{ asset('img/talking-3.jpg') }})"></div>
                            </div>
                            <div class="carousel-caption text-align-auto">
                                <span class="badge badge-outline">JQUERY</span>
                                <h2 class="text-white display-5 font-weight-500 my-4">Powerful plugins built on jQuery</h2>
                                <p class="text-fade d-none d-md-block">Quickly prototype your ideas or build your entire app with prebuilt components.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
      </section>
    </div>


    <div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col">
        {{$dataTable->table()}}
    </div>
  </div>
</div>
@endsection
