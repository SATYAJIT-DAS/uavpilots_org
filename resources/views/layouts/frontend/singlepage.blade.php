@extends('layouts.frontend.frontend_layout')
@section('content')

<div class="container">
    <div class="row p-5">
        <div class="col-12 col-lg-8 p-lg-0  ">
            <img class="w-100 pb-4" src="img/talking-7.jpg" alt="">
            <div class="blog-title">
                <h1>Blog title</h1>
                <dl>
                    <dd>By Admin  29-July-2020</dd>
                </dl>
                <hr>
                <p class="pb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, illum numquam explicabo in dignissimos ab cum facere! Totam, suscipit consectetur eaque cupiditate, nobis quas earum odio veniam esse, dolorem quaerat? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam ducimus enim nobis. Vel voluptates possimus culpa laboriosam, obcaecati aliquid distinctio aliquam nihil quis accusamus. Atque quo minima ipsam odit quibusdam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus pariatur est autem non, ad ipsam labore mollitia reiciendis, hic facere dolor at sed alias voluptatum neque beatae molestiae in. Porro!</p>
            </div>
        </div>
        <div class=" col-12 col-lg-4 p-5 latest-blog">
            <h1 class="pb-5">Latest Post</h1>
            <div class="row">
                <div class="col-4 mb-4">
                    <img src="{{ asset('img/talking-7.jpg') }}" class="rounded-circle" width="70px" height="70px"  alt="">
                </div>
                <div class="col-8 mb-4">
                    <h3 class="">Blog Title</h3>
                    <dl>
                        <dd>By Admin  29-July-2020</dd>
                    </dl>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4 mb-4">
                    <img src="{{ asset('img/talking-6.jpg') }}" class="rounded-circle" width="70px" height="70px"  alt="">
                </div>
                <div class="col-8 mb-4">
                    <h3 class="">Blog Title</h3>
                    <dl>
                        <dd>By Admin  29-July-2020</dd>
                    </dl>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4 mb-4">
                    <img src="{{ asset('img/talking-4.jpg') }}" class="rounded-circle" width="70px" height="70px"  alt="">
                </div>
                <div class="col-8 mb-4">
                    <h3 class="">Blog Title</h3>
                    <dl>
                        <dd>By Admin  29-July-2020</dd>
                    </dl>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4 mb-4">
                    <img src="{{ asset('img/hero.jpg') }}" class="rounded-circle" width="70px" height="70px"  alt="">
                </div>
                <div class="col-8 mb-4">
                    <h3 class="">Blog Title </h3>
                    <dl>
                        <dd>By Admin  29-July-2020</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 p-lg-0  ">
            <img class="w-100 pb-4" src="img/talking-6.jpg" alt="">
            <div class="blog-title">
                <h1>Blog title</h1>
                <dl>
                    <dd>By Admin  29-July-2020</dd>
                </dl>
                <hr>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, illum numquam explicabo in dignissimos ab cum facere! Totam, suscipit consectetur eaque cupiditate, nobis quas earum odio veniam esse, dolorem quaerat? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam ducimus enim nobis. Vel voluptates possimus culpa laboriosam, obcaecati aliquid distinctio aliquam nihil quis accusamus. Atque quo minima ipsam odit quibusdam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus pariatur est autem non, ad ipsam labore mollitia reiciendis, hic facere dolor at sed alias voluptatum neque beatae molestiae in. Porro!</p>
            </div>
        </div>
    </div>
</div>












@endsection
