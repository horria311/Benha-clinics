@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/login.css">
<div class="wrapper">
    <h2>Login</h2>
    <form action="{{route('patient-login.store')}}" method="post">
      @csrf
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="Pemail"  id="Pemail" value="{{old('Pemail')}}"  required>
        @error('Pemail') <p class="error">{{$message}}</p> @enderror
      </div>
      
      <div class="input-box">
        <input type="password" placeholder="Enter password" name="plogin_password"  id="plogin_password" required>
        @error('plogin_password') <p class="error">{{$message}}</p> @enderror
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
        <h3>Don't have account?<a href="/patient-sign">Register now</a></h3>
      </div>
    </form>
  </div>
@endsection