@extends('layout')
@section('content')
@foreach($clinic_info as $clinic)
<div class="clinic">
    <h2>{{$clinic->cname}}</h2>
    <p>{{$clinic->cemail}}</p>
    <p>{{$clinic->cphone}}</p>
</div><br><br><br><br><br><br><br><br><br>
@endforeach
@endsection