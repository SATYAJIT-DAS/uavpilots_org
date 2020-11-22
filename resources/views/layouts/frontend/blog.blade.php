@extends('layouts.frontend.frontend_layout')
@section('content')

<div class="container mt-5">
    <div class="row post-shadow">
        <div class="col-lg-6 col-12 text-white   d-flex align-items-center justify-content-center"  >
            <div class="blog-img">
                <img class="img-responsive" src="img/talking-7.jpg" alt="">
                    <div class="blog-overlay d-flex justify-content-center align-items-center">
                        <a href="{{ route('singlepage') }}">
                        <h2 class="cursor: pointer">Effect 12</h2>
                        </a>
                    </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 py-lg-5 my-lg-5  text-center ">
            <div class="p-5">
                <a href="{{ route('singlepage') }}">
                <h3 class="">I Scroll</h3>
                </a>
                <dl>
                    <dd>By Admin  29-July-2020</dd>
                </dl>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus totam, tempora vero quibusdam corporis ipsa. Pariatur quos magni architecto, dolor magnam vero consequatur, odit natus voluptas laudantium dolore explicabo sit.</p>
            </div>
        </div>
    </div>
    <div class="row flex-row-reverse my-4 post-shadow">
        <div class="col-lg-6 col-12 text-white   d-flex align-items-center justify-content-center"  >
            <div class="blog-img">
                <img class="img-responsive" src="img/talking-6.jpg" alt="">
                    <div class="blog-overlay d-flex justify-content-center align-items-center">
                        <a href="{{ route('singlepage') }}">
                        <h2 class="cursor: pointer">Effect 12</h2>
                        </a>
                    </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 py-lg-5 my-lg-5  text-center ">
            <div class="p-5">
                <a href="{{ route('singlepage') }}">
                <h3 class="">I Scroll</h3>
                </a>
                <dl>
                    <dd>By Admin  29-July-2020</dd>
                </dl>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus totam, tempora vero quibusdam corporis ipsa. Pariatur quos magni architecto, dolor magnam vero consequatur, odit natus voluptas laudantium dolore explicabo sit.</p>
            </div>
        </div>
    </div>
</div>


@endsection
