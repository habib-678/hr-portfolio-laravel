<!DOCTYPE html>
<html lang="en">
<head>
   <!-------- Required meta tags ------------>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Link Swiper's CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   <!----------- Font Awesome CSS ---------->
   <link rel="stylesheet" href="frontend/assets/css/all.min.css">
   <link rel="stylesheet" href="frontend/assets/css/fontawesome.min.css">
   <!-------------- Style CSS -------------->
   <link rel="stylesheet" href="frontend/assets/css/style.css">
   <!----------- Responsive CSS ------------>
   <link rel="stylesheet" href="frontend/assets/css/responsive.css">
   <!--------------- FavIcon --------------->
   <link rel="icon" type="image/png" href="frontend/assets/images/again-icon.png">
   <title>@yield('title') -  HR Portfolio</title>
</head>
<body>
<!--------- PreLoader --------->
<!-- <div id="preloader">
   <div class="load"></div>
</div> -->
<!------- End PreLoader ------->

<!-- ============== HEADER ============= -->
@include('frontend.layouts.header')

@yield('content')

   <!------------ jquery Js ------------>
   <script src="frontend/assets/js/jquery.min.js"></script>
   <!-- Swiper JS -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!------------- Main Js ------------->
   <script src="frontend/assets/js/main.js"></script>
   @stack('scripts')
</body>
</html>
