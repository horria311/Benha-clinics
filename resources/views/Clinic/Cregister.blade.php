@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/register.css">
<div class="container">
    <div class="content">
      <div class="title" >Registration</div>
      <form action="{{route('clinic-sign.store')}}" method="post">
        @csrf
        <div class="user-details">
          
          <div class="input-box">
            <span class="details">Clinic Name</span>
            <input type="text" placeholder="Enter Clinic Name" name="cname"  id="cname" value="{{old('cname')}}" required>
            @error('cname') <p class="error">{{$message}}</p> @enderror
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter Clinic email" name="cemail"  id="cemail" value="{{old('cemail')}}"  required>
            @error('cemail') <p class="error">{{$message}}</p> @enderror
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter Clinic Phone Number"  name="cphone"  id="cphone" value="{{old('cphone')}}" required>
            @error('cphone') <p class="error">{{$message}}</p> @enderror
          </div>
          <div class="input-box">
            <span class="details">Clinic License Number</span>
            <input type="text" placeholder="Enter Clinic License Number" name="cnum"  id="cnum" value="{{old('cnum')}}"  required>
            @error('cnum') <p class="error">{{$message}}</p> @enderror
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter Clinic password" name="Password"  id="Password" required>
            @error('Password') <p class="error">{{$message}}</p> @enderror
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm Clinic password" name="Password_confirmation"  id="Password_confirmation" required>
            @error('Password_confirmation') <p class="error">{{$message}}</p> @enderror
          </div>

        @if($error = Session::get('error'))
          <div class="error">
              {{ $error}}
          </div>
        @endif 
        
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
        <h3>Already have an account? <a href="/clinic-login">Login</a></h3>
        
      </form>
    </div>
  </div>
  @endsection
