
@extends('layouts.frontend.frontend_layout')
@section('content')
    {{-- <div class="page-content page-container" id="page-content"> --}}
        <div class="container-fluid">
            <div class="row flex-row-reverse flex-md-row">
                <div class="col-12 col-md-6 ">
                    <section class="slider position-relative">
                        {{-- <div class="padding"> --}}
                            {{-- <div class="block p-md-3 "> --}}
                                @if (!empty($pageSetting->home_image))
                                    <img src="{{ asset('img/homepage/'.$pageSetting->home_image) }}" class="img-fluid banner-img" alt="Responsive image">
                                @else
                                    <img src="{{asset('img/talking-3.jpg')}}" class="img-fluid banner-img" alt="Responsive image">
                                @endif
                            {{-- </div> --}}
                        {{-- </div> --}}
                    </section>
                </div>
                <div class="col-12 col-md-6 right-div">
                    <div class="d-flex justify-content-center pt-5">
                        <img style="height: 50px" src="{{asset('/img/droners.png')}}" alt="" srcset="">
                    </div>
                    <div class="d-flex justify-content-center py-5">
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat enim quod quo ullam minus tempora, aspernatur voluptas non maxime? Ducimus sequi esse vitae impedit quae iure accusantium fugit aliquam modi.
                        </p>
                    </div>
                    @include('layouts.navigation.frontendnavbar')
                    <section class="user-dataTable mb-5">
                        <div class="container">
                            <div class="row justify-content-center mt-5">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-striped user-data">
                                                <thead>
                                                    <tr class="table-secondary">
                                                        <th>Name</th>
                                                        <th>Industry</th>
                                                        <th>Location</th>
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
                    </section>
                </div>
            </div>
        </div>

@endsection

