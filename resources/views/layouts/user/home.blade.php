@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <h5>{{ __('You are logged in!') }}</h5>
          <h6>{{ __('Welcome onboard You can update your profile from here ') }}</h6>
          <a href="{{ route('user.editProfileView',Auth::user()->id) }}">
                {{ __('Edit Profile') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
