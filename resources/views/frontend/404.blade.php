@extends('frontend.layouts.base-layout')

@section('title', 404)

@section('content')
<!--begin::Wrapper-->
<div class="container">
    <div id="error-page">
        <!--Illustration -->
        <img src="{{asset('frontend/assets/images/404.svg')}}" alt="404 Illustration"
        class="img-fluid" style="max-width: 450px">

        <!--begin::Title-->
        <h1 class="text-white mb-1">
            Oops!
        </h1>
        <!--end::Title-->

        <!--begin::Text-->
        <div class="text-white mb-2">
            The page you are looking for was not found.
        </div>
        <!--end::Text-->


        <!--begin::Link-->
        <div class="mb-0">
            <a href="{{url('/')}}" class="btn-secondary">
                <i class="fa-solid fa-square-arrow-up-right"></i>
                <h6>Go Home</h6>
            </a>
        </div>
        <!--end::Link-->
    </div>
</div>
<!--end::Wrapper-->
@endsection
