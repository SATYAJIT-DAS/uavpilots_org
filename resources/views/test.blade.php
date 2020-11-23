@extends('layouts.app')
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col">
        {{$dataTable->table()}}
    </div>
  </div>
</div>

  {{$dataTable->scripts()}}


@endsection
