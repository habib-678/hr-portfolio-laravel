@section('title', 'Home')
@extends('frontend.layouts.base-layout')
@section('content')
<!-- ============== HERO ============= -->

<div class="container">
  <section id="hero" class="flex-md-column">
     <div class="hero-left align-sm-center order-lg-1 order-2">
        <h4 class="text-sm-center ">
           Hi there, I'm Habib
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
           </picture>
                    </h6>
        <h1 class="hero-title text-sm-center">Creative<br> Solutions<br> for <span class="gradient">Your Brand</span></h1>
        <p class="hero-subtitle text-sm-center">Creating Visual Stories That Captivate and Convert, Making Your Brand Stand Out in a Crowded Market.</p>
        <a href="#" class="btn-secondary" >
           <i class="fa-solid fa-square-arrow-up-right"></i>
           <h6>Contact Me</h6>
        </a>
     </div>
     <div class="hero-right order-lg-2 order-1">
        <div class="wrapper relative";">
           <img src="frontend/assets/images/Man.png" alt="Habibur Rahman"  class="hero-img" width="100%">
           <div class="hero-moving-cursor">
              <img src="frontend/assets/images/Moving_cursor.png" alt="Web Designer" width="110">
           </div>
        </div>
     </div>
     <!-- Scroll Down Animation -->
     <a href="#number-info" class="scrollDown">
        <i class="fa-solid fa-angles-down fa-bounce text-heaven"></i>
     </a>
  </section>
</div>

<div class="animated-overlay animated-overlay1"></div>
<div class="animated-overlay animated-overlay2"></div>
<div class="container custom-divider"></div>

<!-- ============== PAGE 2(EXPERIENCE) ============= -->

<section id="number-info">
  <div class="container">
   <div class="row counters">
      <div class="counter col-4 col-md-12">
         <h2 class="number" data-number="3">0<span class="text-primary">+</span></h2>
         <h3 class="text">YEARS EXPERIENCE</h3>
      </div>
      <div class="counter col-4 col-md-12">
         <h2 class="number" data-number="20">0<span class="text-primary">+</span></h2>
         <h3 class="text">UNIQUE CUSTOMERS</h3>
      </div>
      <div class="counter col-4 col-md-12">
         <h2 class="number" data-number="70">0<span class="text-primary">+</span></h2>
         <h3 class="text">COMPLETED PROJECTS</h3>
      </div>
   </div>
  </div>
</section>
<div class="container custom-divider"></div>
<!-- ============== PAGE 3 (Services) ============= -->
<section id="services" class="overflow-hidden">
  <div class="container">
     <div>
        <div class="d-flex flex-sm-column items-sm-start items-center justify-between">
           <div class="left">
              <div class="short-title">
                 <picture>
                    <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
                    </picture>
                 <h3 class="title">What I offer?</h3>
              </div>
              <h2 class="title-headline bg-title">Design <strong class="gradient">solutions</strong> that bring your ideas to life .</h2>
           </div>
           <div class="right">
              <a href="#" class="btn-secondary" >
                 <i class="fa-solid fa-square-arrow-up-right"></i>
                 <h6>Get a Quote</h6>
              </a>
           </div>
        </div>

        <div class="service-wrapper py-2 mt-3">
          <!-- begin:items -->
          @foreach ($services as $key=> $service)
          <div class="item">
             <h2 class="service-name">0{{$key + 1}}. {{$service->title}}</h2>
             <p class="service-paragraph">{{$service->description}}</p>
             <a href="#" class="view-more"><i class="fa-solid fa-arrow-right-long"></i></a>
             <img src="{{asset('storage/services/'.$service->image)}}" alt="UX/UI Design">
          </div>
          @endforeach
          <!-- end:items -->
        </div>
     </div>
  </div>
</section>
<!-- ============== PAGE 4 (Testimonial) ============= -->
<div class="container">
  <div id="testimonial">
     <div class="grid-center items-center">
        <div class="short-title">
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
           </picture>
           <h3 class="title">Reviews</h3>
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
           </picture>
        </div>
        <h2 class="title-headline bg-title text-center">What My <strong class="gradient">Clients</strong> Say.</h2>
     </div>
     <div class="tesimonial-wrapper">
        <div class="swiper reviewSlide">
           <div class="swiper-wrapper">
              @foreach ($reviews as $review)  
              <div class="swiper-slide border-linear">
                <div class="head">
                    <img src="{{asset('storage/testimonial/'.$review->company_logo)}}" width="50px">
                    <img src="frontend/assets/images/quote.png" alt="quote" width="100px">
                </div>
                <div class="body">
                    <div class="d-flex">
                      @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                        <i class="fa-solid fa-star text-primary"></i>
                        @elseif($review->rating >= $i - 0.5)
                        <i class="fa-solid fa-star-half-stroke text-primary"></i>
                        @else
                        <i class="fa-solid fa-star text-white"></i>
                        @endif
                      @endfor
                    </div>
                    <p class="comment">{{$review->feedback}}</p>
                </div>
                <div class="footer">
                    <img src="{{asset('storage/testimonial/'.$review->client_image)}}" alt="Reviewer" width="55px" height="55px" style="object-fit: cover; object-position: top;">
                    <div>
                      <h6 class="fs-point8"><strong>{{$review->client_name}}</strong></h6>
                      <p>{{$review->designation}}</p>
                    </div>
                </div>
              </div>
              @endforeach
           </div>
        </div>
        <div class="swiper-pagination"></div>
     </div>

  </div>
</div>
<!--=============== PAGE 5 (Projects) ===============-->

<section id="projects">
  <!-- title -->
  <div class="grid-center items-center">
     <div class="short-title">
        <picture>
           <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
           </picture>
        <h3 class="title">Works</h3>
        <picture>
           <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
        </picture>
     </div>
     <h2 class="title-headline bg-title text-center">My Latest<strong class="gradient"> Works</strong></h2>
  </div>

  <div class="container">

     <div class="d-flex gap-1  justify-between" style="max-width: 800px; margin: 0 auto;">
        <!-- item:begin -->
        @foreach ($services as $service)
        <div class="flex-grow">
           <div class="tab_btn" data-service-id="{{ $service->id }}">
              <h5>{{$service->title}}</h5>
           </div>
        </div>
        @endforeach
        <!-- item:end -->
     </div>

     <!--UiUx-content -->
      <div class="content active">
        <div id="project-content">
          {{-- Projects will be here from partials.project file --}}
        </div>
        <div class="grid-center py-2">
           <a href="#" class="btn-secondary" >
              <i class="fa-solid fa-square-arrow-up-right"></i>
              <h6>View More</h6>
           </a>
        </div>
      </div>
  </div>
</section>

<!-- ============== PAGE 6(ABOUT) ============= -->
<div class="container">
  <section id="about" class="row items-center">
     <div class="col-6 col-md-12 left-img">
        <img src="frontend/assets/images/man-smiling.png" alt="" width="100%" style="max-width: 350px;">
     </div>
     <div class="col-6 col-md-12 right-side">
        <div class="short-title">
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
            </picture>
           <h3 class="title">ABOUT ME</h3>
        </div>
        <h2 class="title-headline bg-title">Designing with <strong class="gradient">Passion</strong> and <strong class="gradient">Purpose</strong>.</h2>
        <p class="title-paragraph">Hi, I'm <strong class="text-primary">Habibur Rahman</strong>, a passionate Graphics and Web Designer based in Bangladesh. I have a strong love for creating visually appealing and user-friendly designs that not only look great but also serve a purpose.<br><br> My journey in design began with a fascination for art and technology, which eventually led me to explore graphic and web design. Over the years, I've honed my skills in creating clean, modern, and functional designs that help brands communicate their message effectively.</p>
     </div>
  </section>
</div>
<!-- ========== PAGE 7(Skills & Experience) =========== -->

<section id="skillAndExperience" class="py-2">
  <div class="container">
     <div class="row">
        <div class="col-7 col-md-12 bg-gradient-secondary rounded p-3">
           <div class="skills">
              <h2 class="title-headline bg-title"><strong class="gradient"> Skills </strong></h2>
              <div class="skill-items d-flex justify-between gap-1" style="flex-wrap: wrap;">
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/illustrator.png" alt="illustrator" width="30">
                       <p class="text-heaven">70%</p>
                    </div>
                    <h5 class="text-heaven">Illustrator</h5>
                 </div>
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/bootstrap.png" alt="Bootstrap" width="30">
                       <p class="text-heaven">90%</p>
                    </div>
                    <h5 class="text-heaven">Bootstrap</h5>
                 </div>
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/css-3.png" alt="Css" width="30">
                       <p class="text-heaven">95%</p>
                    </div>
                    <h5 class="text-heaven">Css</h5>
                 </div>
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/Js.png" alt="Javascript" width="30">
                       <p class="text-heaven">45%</p>
                    </div>
                    <h5 class="text-heaven">Js</h5>
                 </div>
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/wordpress.png" alt="Wordpress" width="30">
                       <p class="text-heaven">550%</p>
                    </div>
                    <h5 class="text-heaven">Wordpress</h5>
                 </div>
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/php.png" alt="Php" width="30">
                       <p class="text-heaven">25%</p>
                    </div>
                    <h5 class="text-heaven">Php</h5>
                 </div>
              </div>
           </div>
        </div>
        <div class="col-5 col-md-12 bg-gradient-secondary rounded p-3">
           <div class="experience">
              <h2 class="title-headline bg-title"><strong class="gradient"> Experience </strong></h2>
              <div class="experience-items d-flex justify-center gap-1" style="flex-wrap: wrap;">
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/company-4.png" alt="company" width="30">
                       <p class="text-heaven">Project Designer</p>
                    </div>
                    <h5 class="text-heaven"> Jan 22 - Dec 23 </h5>
                 </div>
                 <div class="item">
                    <div class="card">
                       <img src="frontend/assets/images/clevpro-logo-white.png" alt="illustrator" width="120">
                       <p class="text-heaven">Design Intern</p>
                    </div>
                    <h5 class="text-heaven">Jan 24 - Onging </h5>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</section>


<!-- ============== PAGE 8 (Blogs) ============= -->
<section id="blogs" style="padding: 5rem 0;">
  <div class="container">
     <!-- title -->
     <div class="grid-center items-center">
        <div class="short-title">
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
              </picture>
           <h3 class="title">Articles</h3>
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
           </picture>
        </div>
        <h2 class="title-headline bg-title text-center">Read Our Latest <strong class="gradient">Blogs</strong></h2>
     </div>
     <div class="swiper blogSlider">
        <div class="swiper-wrapper">
           <div class="swiper-slide">
              <div class="blog_item">
                 <img src="frontend/assets/images/branding.jpeg" alt="" width="100%" class="blog_img">
                 <h5><span class="category">Brading</span></h5>
                 <h2 class="blog_title">15 Design tips that always deliver growth</h2>
                 <div class="blog_popularity d-flex items-center gap-1">
                    <div class="comment d-flex items-center gap-sm">
                      <i class="fa-solid fa-comment-dots fs-point8 text-heaven"></i>
                      <h6 class="fs-point8 fw-light text-heaven">8.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-eye fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">1.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-share-nodes fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">3.5k
                      </h6>
                    </div>
                  </div>
              </div>
           </div>
           <div class="swiper-slide">
              <div class="blog_item">
                 <img src="frontend/assets/images/blog-3.jpg" alt="" width="100%" class="blog_img">
                 <h5><span class="category">Social Marketing</span></h5>
                 <h2 class="blog_title">To Get Something, You have to work hard</h2>
                 <div class="blog_popularity d-flex items-center gap-1">
                    <div class="comment d-flex items-center gap-sm">
                      <i class="fa-solid fa-comment-dots fs-point8 text-heaven"></i>
                      <h6 class="fs-point8 fw-light text-heaven">8.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-eye fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">1.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-share-nodes fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">3.5k
                      </h6>
                    </div>
                  </div>
              </div>
           </div>
           <div class="swiper-slide">
              <div class="blog_item">
                 <img src="frontend/assets/images/blog-2.png" alt="" width="100%" class="blog_img">
                 <h5><span class="category">Web Design</span></h5>
                 <h2 class="blog_title">How to Design a Website Easily with 12 Steps</h2>
                 <div class="blog_popularity d-flex items-center gap-1">
                    <div class="comment d-flex items-center gap-sm">
                      <i class="fa-solid fa-comment-dots fs-point8 text-heaven"></i>
                      <h6 class="fs-point8 fw-light text-heaven">8.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-eye fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">1.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-share-nodes fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">3.5k
                      </h6>
                    </div>
                  </div>
              </div>
           </div>
           <div class="swiper-slide">
              <div class="blog_item">
                 <img src="frontend/assets/images/blog-1.png" alt="" width="100%" class="blog_img">
                 <h5><span class="category">Brading</span></h5>
                 <h2 class="blog_title">How to make branding with Only 3 Steps.</h2>
                 <div class="blog_popularity d-flex items-center gap-1">
                    <div class="comment d-flex items-center gap-sm">
                      <i class="fa-solid fa-comment-dots fs-point8 text-heaven"></i>
                      <h6 class="fs-point8 fw-light text-heaven">8.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-eye fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">1.49k
                      </h6>
                    </div>
                    <div class="view d-flex items-center gap-sm">
                      <i class="fa-solid fa-share-nodes fs-point8 text-heaven"></i>
                      <h6 class=" fw-light fs-point8 text-heaven">3.5k
                      </h6>
                    </div>
                  </div>
              </div>
           </div>
        </div>
     </div>
     <div class="grid-center py-2">
        <a href="#" class="btn-secondary" >
           <i class="fa-solid fa-square-arrow-up-right"></i>
           <h6>View More</h6>
        </a>
     </div>
  </div>
</section>

<!-- ============== PAGE 9 ============= -->

<section id="contact">
  <div class="container">
     <!-- title -->
     <div class="grid-center items-center">
        <div class="short-title">
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
              </picture>
           <h3 class="title">Contact Me</h3>
           <picture>
              <img decoding="async" src="frontend/assets/images/light.webp" alt="✨" width="26" height="26">
           </picture>
        </div>
        <h2 class="title-headline bg-title text-center mb-1">let's <strong class="gradient">Talk</strong> about your project.</h2>
        <p class="text-center w-50 w-sm-100">Let’s embark on creative journey together by shaping a visual narrative of your brand in the crowded digital space.</p>
     </div>
     <div class="grid-center py-1">
        <a href="#" class="btn-secondary" >
           <i class="fa-solid fa-square-arrow-up-right"></i>
           <h6>View More</h6>
        </a>
     </div>
  </div>
</section>



<!-- ============== FOOTER ============= -->
<div class="container">
  <h2 style="font-size: 20vw; text-align: center;">AGAiN</h2>
</div>
<footer class="container">
<div class="custom-divider mt-1"></div>
  <div class="d-flex justify-between py-1">

     <p>© All rights reserved.</p>
     <p>Made by <span class="gradient fw-bold">Habibur Rahman</span></p>
  </div>
</footer>
@endsection
