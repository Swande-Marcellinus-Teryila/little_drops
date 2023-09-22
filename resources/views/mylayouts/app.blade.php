<!DOCTYPE html>
<html lang="en">
<head>
@yield("meta_tags")
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-digimedia-v3.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
   <title>@yield("title")</title> 
  </head>
  <body>
      <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
  @include("mylayouts.header")
  @yield("content")

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © Little drops. All Rights Reserved. 
          
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('assets/js/animation.js')}}"></script>
  <script src="{{asset('assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script src="{{ asset('assets/js/form-components.js') }}"></script>
  <script src="{{ asset('assets/js/transactions.js') }}"></script>
  <script src="{{asset('assets/js/unfinished-transactions.js')}}"></script>
  
</body>
</html>