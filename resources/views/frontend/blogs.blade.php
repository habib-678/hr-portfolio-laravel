@section('title', 'Blogs')
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
<section id="blogs" class="overflow-hidden">
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
         @forelse ($blogs as $blog)
         <div class="col-6 col-md-12">
             <a href="{{ route('blog.show', $blog->slug) }}" class="blog_item">
               <img src="{{ asset($blog->thumbnail) }}" alt="" width="100%" class="blog_img">
               <h5><span class="category">{{ $blog->category ?? 'Blog' }}</span></h5>
               <h2 class="blog_title">{{ $blog->title }}</h2>
            </a>
         </div>
         @empty
         <div class="col-12">
            <p>No blogs found.</p>
         </div>
         @endforelse
      </div>
      <div class="d-flex items-center justify-center mb-3 mt-1">
         {{ $blogs->links('frontend.partials.pagination') }}
      </div>
   </div>
</section>
<!-- End: Blogs -->
@endsection