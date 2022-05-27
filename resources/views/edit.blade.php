@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/contact.css">
<div class="container">
    <div class="content">
    
      <div class="right-side">
        <div class="topic-text">Make An Appointment</div>
      <form action="{{route('book.update', $book->id)}}" method="post">
        @csrf
        @method('put')
        <div class="input-box">
          
          <input type="text" placeholder="Enter The Patient name" name="bname" id="bname" value="{{$book->bname}}">
          @error('bname') <p class="error">{{$message}}</p> @enderror
         
        </div>
        <div class="input-box">
          
          <select name="clinic" id="clinic" value="{{$book->clinic}}" >
            <option value=""  disabled selected hidden>Choose Clinic</option>
            @foreach($clinic_users as $i)
            <option value="{{ $i->id }}">{{$i->cname}}</option>
            @endforeach
          </select>
          @error('clinic') <p class="error">{{$message}}</p> @enderror
         
        </div>
        <div class="input-box">
         
          <input type="date" placeholder="Enter date do you want" name="date" id="date" value="{{$book->date}}">
          @error('date') <p class="error">{{$message}}</p> @enderror
          
        </div>
        <div class="input-box">
          
          <input type="time" placeholder="Enter time do you want" name="time" id="time" value="{{$book->time}}">
          @error('time') <p class="error">{{$message}}</p> @enderror
          
        </div>
        
        <div class="input-box message-box">
         
          <textarea placeholder="Enter your message" name="bmessage" value="{{$book->bmessage}}"></textarea>
          @error('bmessage') <p class="error">{{$message}}</p> @enderror
        </div>
        @if($alert = Session::get('alret'))
          <div class="error">
            {{ $alert}}
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