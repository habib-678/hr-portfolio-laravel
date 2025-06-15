@extends('frontend.layouts.base-layout')
@section('title', $blog->title ?? 'Blog')
@push('meta')
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta property="og:image" content="{{ asset($blog->thumbnail) }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:type" content="article">
@endpush
@push('styles')
    <style>
        .blog-content img{
            width: 100% !important;
            border-radius: 20px;
        }
    </style>
@endpush
@section('content')
<!-- Begin: Breadcrumb -->
<div class="container">
    <div class="breadcrumb">
        <h1>{{ $blog->title ?? 'Blog' }}</h1>
        <ul class="d-flex items-center gap-sm ">
            <li><a href="{{ url('/') }}" class="text-primary">Home</a></li>
            <li><i class="fa-solid fa-chevron-right"></i></li>
            <li>{{ $blog->title ?? 'Blog' }}</li>
        </ul>
    </div>
</div>
<!-- End: Breadcrumb -->
<!-- Begin: Blog Details -->
<section id="blog-details" class="overflow-hidden">
    <div class="container">
        <div class="blog-details">
            <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title }}" width="100%" class="rounded mb-2">
            <h2 class="mb-1">{{ $blog->title }}</h2>
            <p class="d-flex items-center mb-3">
                <i class="fa-solid fa-calendar-days mr-1"></i> {{ $blog->created_at->format('F j, Y') }}
                <span class="ml-1 mr-1"> | </span>
                <i class="fa-solid fa-user mr-1"></i> {{ $blog->author ?? 'Admin' }}
            </p>    
            <div class="blog-content">
                {!! $blog->content !!}
            </div> 
            <div class="mt-4">
                <h5>Share:</h5>
                <ul class="social-icons d-flex gap-1 mt-1">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="text-primary"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="text-primary"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="text-primary"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
      </div>
</section>
<!-- End: Blog Details -->
@endsection
