<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF_8">
        <meta name="viewport" content="width=device-width, initial-scale-1.0">
        <title> Clinic Booking Site</title>
        <!--link rel="stylesheet" href="css/index.css"-->
        <link rel="stylesheet" href="/css/style.css">
        <!--Normalize css file -->
        <link rel="stylesheet" href="/css/normalize.css">
        
        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200&display=swap" rel="stylesheet">
        <!--Font awesome library -->
        <link rel="stylesheet" href="css/all.css">
    </head>
    <body>
  @if(session('PloggedIn'))
  <nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="/">Benha Clinics</a></div>
        <div class="nav-links">
            <div class="sidebar-logo">
                <span class="logo-name">BENHA CLINICS</span>
                <i class='bx bx-x' ></i>
            </div>
        <ul class="links">
          <li><a href="/home">HOME</a></li>
          <li>
            <a href="/patient-appointment">MY APPOINTMENTS</a>
          </li>
          <li>
            <a href="/book">MAKE APPOINTMENTS</a>
          </li>
          <li><a href="/clinic-info">CLINICS</a></li>
          <li><a href="/contact">CONTACT US</a></li>
          <li><a href="/">ABOUT US</a></li>
          <li class="logout"> 
            <form action="{{ route('patient-login.destroy', session('id')) }}" method="post">
              @csrf
              @method('delete')
              <input type="submit" class="delete_butt_logout"  value="Log out">
            </form>
          </li>
        </ul>

      </div>
    </div>  
    
</nav>
  
@elseif(session('CloggedIn'))
<nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="/">Benha Clinics</a></div>
        <div class="nav-links">
            <div class="sidebar-logo">
                <span class="logo-name">BENHA CLINICS</span>
                <i class='bx bx-x' ></i>
            </div>
        <ul class="links">
          <li><a href="/home">HOME</a></li>
          <li>
            <a href="/clinic-appointment">MY APPOINTMENTS</a>
          </li>
          <li><a href="/clinic-info">CLINICS</a></li>
          <li><a href="/contact">CONTACT US</a></li>
          <li><a href="/">ABOUT US</a></li>
          <li class="logout"> 
          <form action="{{ route('patient-login.destroy', session('id_clinic')) }}" method="post">
          @csrf
          @method('delete')
          <input type="submit" class="delete_butt_logout"  value="Log out">
          </form>
        </li>
        </ul>

      </div>
    </div>  
</nav>
@else
<nav>
    <div class="navbar">
        <i class='bx bx-menu'></i>
        <div class="logo"><a href="/">Benha Clinics</a></div>
        <div class="nav-links">
            <div class="sidebar-logo">
                <span class="logo-name">BENHA CLINICS</span>
                <i class='bx bx-x' ></i>
            </div>
        <ul class="links">
          <li><a href="/home">HOME</a></li>
          <li>
            <a href="#">LOGIN</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="/patient-login">Patient</a></li>
              <li><a href="/clinic-login">Clinic</a></li>              
            </ul>
          </li>
          <li>
            <a href="#">REGISTER</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="/patient-sign">Patient</a></li>
              <li><a href="/clinic-sign">Clinic</a></li>
            </ul>
          </li>
          <li>
            <a href="/book">MAKE APPOINTMENTS</a>
          </li>
          <li><a href="/clinic-info">CLINICS</a></li>
          <li><a href="/contact">CONTACT US</a></li>
          <li><a href="/">ABOUT US</a></li>

        </ul>
      </div>
    </div>  
</nav>
@endif
   
    
  <div class="img">
  @yield('content')
  </div>
 
<script src="/JS/script.js"></script>
</body>
</html>