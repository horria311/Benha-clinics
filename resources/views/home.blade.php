@extends('layout')
@section('content')
<div class="center">
    <div class="sub_title">Welcome to our Website</div>
    <div class="sub_title">saving book online</div>
    @if($message = Session::get('message'))
      <div class="alert1">
        {{ $message}}
      </div>
    @endif 
    @if($alert = Session::get('alert'))
      <div class="alert2">
        {{ $alert}}
      </div>
    @endif 

</div>
<!--Start footer-->
<div class="footer">
    &copy; 2022 <span>Pantomath </span> All Right Reserved
  </div>
  <!--End footer-->
@endsection