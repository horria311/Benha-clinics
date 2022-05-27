@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/login.css">
<div class="wrapper">
    <h2>Login</h2>
    <form action="{{route('clinic-login.store')}}" method="post">
      @csrf
      <div class="input-box">
        <input type="text" placeholder="Enter Clinic email" name="Cemail" id="Cemail"  value="{{old('Cemail')}}" required>
        @error('Cemail') <p class="error">{{$message}}</p> @enderror
      </div>
      
      <div class="input-box">
        <input type="password" placeholder="Enter Clinic password" name=" cpassword" id="cpassword" required>
        @error('cpassword') <p class="error">{{$message}}</p> @enderror
      </div>

      @if($error = Session::get('error'))
          <div class="error">
              {{ $error}}
          </div>
        @endif 
      
      
      <div class="input-box button">
        <input type="Submit" value="login">
      </div>
      <div class="text">
        <h3>Don't have account?<a href="/clinic-sign">Register now</a></h3>
      </div>
    </form>
  </div>
@endsection