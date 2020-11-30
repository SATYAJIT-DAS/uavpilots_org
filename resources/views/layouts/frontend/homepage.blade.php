
@extends('layouts.frontend.frontend_layout')
@section('content')
    <div class="page-content page-container" id="page-content">
        <section class="slider position-relative">
        <div class="padding">
            <div class="block p-md-3 ">
                @if (!empty($pageSetting->home_image))
                    <img src="{{ asset('img/homepage/'.$pageSetting->home_image) }}" class="img-fluid" alt="Responsive image">
                @else
                    <img src="{{asset('img/talking-3.jpg')}}" class="img-fluid" alt="Responsive image">
                @endif
            </div>
        </div>
      </section>
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
@endsection
