 @extends('backend.layouts.auth-app')
@section('title', 'Login')
@section('content')
<div class="d-flex justify-content-center flex-column flex-root">
    <!--begin::Body-->
        <div class="d-flex align-items-center justify-content-center p-10 p-lg-20">
            <!--begin::Card-->
            <div class="card d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-10 p-md-20 w-100">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="hr_sign_in_form" action="{{ route('admin.login.submit') }}" method="post">
                    @csrf
                    <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 fw-bold mb-3 text-uppercase">Sign In</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">
                                Enter your details to login to your account:
                            </div>
                            <!--end::Subtitle=-->
                        </div>
                        <!--end::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                        <!--end::Email-->
                        <span class="text-danger errors"></span>
                    </div>
                    <!--end::Input group=-->
                    <div class="fv-row mb-3">
                        <!--begin::Password-->
                        <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
                        <!--end::Password-->
                        <span class="text-danger errors"></span>
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <!--begin::Link-->
                        <a href="{{route('admin.forget-password')}}" class="link-primary"  id="forgot-password-link">Forgot Password ?</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="hr_sign_in_submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Sign In</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                   <!--begin::Alert-->
                    <div id="message" class="alert alert-success align-items-center p-5" style="display: none;">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column">
                            <!--begin::Title-->
                            <h4 class="mb-1 text-dark">Success!</h4>
                            <!--end::Title-->

                            <!--begin::Content-->
                            <span id="message-text">You're now Logging in...</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Alert-->
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
    $('#hr_sign_in_form').on('submit', function(e) {
        e.preventDefault();

        let submitBtn = $('#hr_sign_in_submit')[0];
        //get formData
        var formData = new FormData($('#hr_sign_in_form')[0]);
        // var actionUrl = $(this).attr('action');

        //call ajax request
        $.ajax({
            url: "{{ route('admin.login.submit') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType : 'json',
            beforeSend: function() {
                //show loader
                submitBtn.setAttribute("data-kt-indicator", "on");

                //clear errors
                $('input').removeClass('is-invalid');
                $('input').next().text('');
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect_url;

                }
            },
            error: function (resp) {
                console.log(resp)
                if(resp.responseJSON && resp.responseJSON.errors){
                    var errors = resp.responseJSON.errors;
                    for (let key in errors) {
                        //key is the input name
                        $('[name="' + key + '"]').addClass('is-invalid');
                        $('[name="' + key + '"]').next().text(errors[key]);
                    }
                }else{
                    alert(resp.responseJSON.message);
                }
            },
            complete: function() {
                submitBtn.removeAttribute("data-kt-indicator");
            }
        })

    });

</script>
@endpush
