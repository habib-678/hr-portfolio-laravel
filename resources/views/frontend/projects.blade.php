@section('title', 'Contact Us')
@extends('frontend.layouts.base-layout')
@section('content')
<!-- Begin: Breadcrumb -->
<div class="container">
   <div class="breadcrumb">
      <h1>Projects</h1>
      <ul class="d-flex items-center gap-sm ">
         <li><a href="{{ url('/') }}" class="text-primary">Home</a></li>
         <li><i class="fa-solid fa-chevron-right"></i></li>
         <li>Projects</li>
      </ul>
   </div>
</div>
<!-- End: Breadcrumb -->

<!-- Begin: Projects -->
<section id="projects" style="padding: 0 !important">
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


     <!--UiUx-content -->
      <div class="content active">
         @include('frontend.partials.project', ['projects' => $projects])
         {{isset($projects) ? $projects->links('frontend.partials.pagination') : ''}}
      </div>
  </div>
</section>
<!-- End: Projects -->

@endsection