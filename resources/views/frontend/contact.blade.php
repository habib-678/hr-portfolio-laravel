@section('title', 'Contact Us')
@extends('frontend.layouts.base-layout')
@section('content')
<!-- Begin: Breadcrumb -->
<div class="container">
   <div class="breadcrumb"  style="margin-top: 5.5rem">
      <h1>Contact Us</h1>
      <ul class="d-flex items-center gap-sm ">
         <li><a href="{{ url('/') }}" class="text-primary">Home</a></li>
         <li><i class="fa-solid fa-chevron-right"></i></li>
         <li>Contact Us</li>
   </div>
</div>
<!-- End: Breadcrumb -->

<!-- Begin: Contact Form -->
<div class="container">
   <div class="contact-form">
      <form id="contact-form">
         @csrf
         <div class="icon-input d-flex items-center">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Your Name" name="name" required>
         </div>

         <div class="icon-input d-flex items-center">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="email" required>
         </div>

         <div class="icon-input d-flex items-center">
            <i class="fas fa-tag"></i>
            <input type="text" placeholder="Subject" name="subject">
         </div>

         <div class="icon-input d-flex items-start">
            <i class="fas fa-comment-dots" style="margin-top: 3px"></i>
            <textarea placeholder="Message" name="message" style="height: 150px" required></textarea>
         </div>
         <div class="d-flex justify-center">
            <button type="submit" class="btn-secondary">
            <i class="fa-solid fa-square-arrow-up-right"></i>
            <h6>Send Message</h6>
         </button>
         </div>
      </form>
   </div>
</div>
<!-- End: Contact Form -->
@endsection

@push('scripts')
<script>
   $('#contact-form').on('submit', function(e) {
       e.preventDefault();
       
       $.ajax({
         url: "{{ route('contact.submit')}}",
         type: "POST",
         data: $(this).serialize(),
         success: function(response) {
             if (response.success) {
                 showAlert('Success!', response.message, 'success');
                 $('#contact-form')[0].reset(); 
             } else {
                  showAlert('Error!', 'Something went wrong. Please try again.', 'error');
             }
         },
         error: function(xhr, status, error) {
             alert('An error occurred: ' + error);
         }
       })
   });
</script>
@endpush