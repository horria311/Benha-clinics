@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/contact.css">
<div class="container">
    <div class="content" style="height:720px;">
    
      <div class="right-side">
        <div class="topic-text">Make An Appointment</div><br>
      <form action="{{route('book.store')}}" method="post">
        @csrf
        <div class="input-box">
          
          <input type="text" placeholder="Enter The Patient name" name="bname" id="bname" value="{{old('bname')}}">
          @error('bname') <p class="error">{{$message}}</p> @enderror
         
        </div>
        <div class="input-box">
          
          <select name="clinic_id" id="clinic_id" value="{{old('clinic_id')}}" >
            <option value=""  disabled selected hidden>Choose Clinic</option>
            @foreach($clinic_users as $i)
            <option value="{{ $i->id }}">{{$i->cname}}</option>
            @endforeach
          </select>
          @error('clinic') <p class="error">{{$message}}</p> @enderror
         
        </div>
        <div class="input-box">
         
          <input type="date" placeholder="Enter date do you want" name="date" id="date" value="{{old('date')}}">
          @error('date') <p class="error">{{$message}}</p> @enderror
          
        </div>
        <div class="input-box">
          
          <input type="time" placeholder="Enter time do you want" name="time" id="time" value="{{old('time')}}">
          @error('time') <p class="error">{{$message}}</p> @enderror
          
        </div>
        
        <div class="input-box message-box">
         
          <textarea placeholder="Enter your message" name="bmessage">{{old('bmessage')}}</textarea>
          @error('bmessage') <p class="error">{{$message}}</p> @enderror
        </div>
        @if($message = Session::get('message'))
          <div class="alert">
            {{ $message}}
          </div>
        @endif 
        <div class="button">
          <input type="submit" value="Submit" >
        </div>
      </form>
    </div>
    </div>
  </div>
@endsection