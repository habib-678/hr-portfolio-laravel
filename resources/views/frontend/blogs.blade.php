@section('title', 'Contact Us')
@extends('frontend.layouts.base-layout')
@section('content')
<!-- Begin: Breadcrumb -->
<div class="container">
   <div class="breadcrumb">
      <h1>Blogs</h1>
      <ul class="d-flex items-center gap-sm ">
         <li><a href="{{ url('/') }}" class="text-primary">Home</a></li>
         <li><i class="fa-solid fa-chevron-right"></i></li>
         <li>Blogs</li>
      </ul>
   </div>
</div>
<!-- End: Breadcrumb -->

<!-- Begin: Blogs -->
<section id="blogs">
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
      <div class="row blogs">
         <div class="col-6 col-md-12">
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
         <div class="col-6 col-md-12">
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
         <div class="col-6 col-md-12">
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
         <div class="col-6 col-md-12">
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
</section>
<!-- End: Blogs -->

@endsection