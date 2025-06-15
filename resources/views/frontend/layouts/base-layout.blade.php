<!DOCTYPE html>
<html lang="en">
<head>
   <!-------- Required meta tags ------------>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   @stack('meta')
   <!-- Link Swiper's CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   <!----------- Font Awesome CSS ---------->
   <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.min.css')}}">
   <!-------------- Style CSS -------------->
   <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
   <!----------- Responsive CSS ------------>
   <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
   <!--------------- FavIcon --------------->
   <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/again-icon.png')}}">
   <title>@yield('title') -  HR</title>
   @stack('styles')
</head>
<body>
<!--------- PreLoader --------->
<div id="preloader">
  <div class="spinner">
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>
<!------- End PreLoader ------->
{{-- <div class="animated-overlay animated-overlay1"></div>
<div class="animated-overlay animated-overlay2"></div> --}}
<!-- ============== HEADER ============= -->
@include('frontend.layouts.header')

@yield('content')

<!-- ============== FOOTER ============= -->
@include('frontend.layouts.footer')
<div class="custom-cursor"></div>


<!-- Begin: Custom Alert -->
<div id="custom-alert" class="custom-alert">
  <div class="alert-content"
       role="alertdialog"
       aria-labelledby="alert-title"
       aria-describedby="alert-message"
       tabindex="-1">
       
    <div class="alert-icon" id="alert-icon">
      <i class="fas fa-circle-check"></i>
    </div>
    <h4 id="alert-title">Success</h4>
    <p id="alert-message">Data submitted successfully.</p>
    <button class="close-alert-btn">OK</button>
  </div>
</div>

<!-- end: Custom Alert -->

   <!------------ jquery Js ------------>
   <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
   <!-- Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
   <!------------- Main Js ------------->
   <script src="{{asset('frontend/assets/js/main.js')}}"></script>
   @stack('scripts')
</body>
</html>
