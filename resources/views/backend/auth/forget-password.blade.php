@extends('backend.layouts.auth-app')
@section('title', 'Forget Password')
@section('content')
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="hr_forget_password_form">
                   
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 fw-bolder mb-3">Forget Password</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        @csrf
                        <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" id="email" />
                        <span class="text-danger"></span>
                        <!--end::Email-->
                        
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="hr_forget_password_submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Forget Password</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Form-->
    </div>
    <!--end::Body-->
</div>
@endsection

@push('scripts')
<script>
    $('#hr_forget_password_form').on('submit', (e) =>{
        e.preventDefault();
        
        let submitBtn = $('#hr_forget_password_submit')[0];

        let formData = new FormData($('#hr_forget_password_form')[0]);

        $.ajax({
            url: "{{ route('admin.forget-password.submit') }}",
            type:'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                //show loader
                submitBtn.setAttribute("data-kt-indicator", "on");
                submitBtn.disabled = true;
            },
            success: function(response) {
                if(response.success){
                    $('input').val('');
                    $('input').removeClass('is-invalid');
                    $('input').next().text('');
                    alert(response.message)
                }
            },
            error: function(errors){
                if(errors.responseJSON && errors.responseJSON.errors){

                    let errorsMsg = errors.responseJSON.errors;

                    for (let key in errorsMsg) {
                        //key is the input name
                        $('#hr_forget_password_form input[name="' + key + '"]').addClass('is-invalid');
                        $('#hr_forget_password_form input[name="' + key + '"]').next().text(errorsMsg[key][0]);
                    }
                }else {
                    alert("Something went wrong. Please try again.");
                }
            },
            complete: function(){
                //hide loader
                submitBtn.removeAttribute("data-kt-indicator");
                submitBtn.disabled = false;
            }
        })
    })
</script>
@endpush

