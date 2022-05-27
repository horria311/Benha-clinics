@extends('layout')
@section('content')
<link rel="stylesheet" href="/css/contact.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Benha</div>
          <div class="text-two">El-Qalubyia</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+201221780501</div>
          <div class="text-two">+201060473212</div>
          <div class="text-two">+201018167100</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">bfci.bu.edu.eg@outlook.com</div>
          <div class="text-two">info.Benha@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any problems or suggestion contact us:</p><br>
      <form action="{{route('contact.store')}}" method="post">
        @csrf
        <div class="input-box">
          <input type="text" placeholder="Enter your name" name = "coname" id = "coname" >
          @error('coname') <p class="error">{{$message}}</p> @enderror
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email" name = "coemail" id = "coemail">
          @error('comail') <p class="error">{{$message}}</p> @enderror
        </div>
        <div class="input-box message-box">
          <textarea placeholder="Enter your message" name = "comessage" id = "comessage"></textarea>
          @error('comessage') <p class="error">{{$message}}</p> @enderror
        </div>
        <div class="button">
          <input type="submit" value="Send Now" >
        </div>
      </form>
    </div>
    </div>
  </div>
@endsection