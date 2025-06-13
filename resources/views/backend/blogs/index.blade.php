
@section('title', "Blogs")
@extends('backend.layouts.base-app')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Blogs</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('backend/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-primary">Blogs</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                            transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kk-product-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search blogs..">
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->

                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5"
                            data-select2-id="select2-data-123-0tix">
                            <!--begin::Add product-->
                            <a href="javascript:;" class="btn btn-primary me-3" onclick="addNew()">+ Add Blog</a>
                            <!--end::Add product-->
                        </div>

                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div id="kt_table_Service_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    style="width:100%" id="dataTable">

                                    <thead>

                                        <tr>

                                            <th>#</th>

                                            <th class="min-w-100px">Thumbnail</th>

                                            <th class="min-w-200px">Title</th>

                                            <th class="min-w-100px">Author</th>

                                            <th class="min-w-100px">Status</th>

                                            <th class="min-w-150px">Published At</th>

                                            <th class="min-w-100px">Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                    </tbody>

                                </table>


                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>


    <!--begin::Modal - New Blog-->
    <div class="modal fade" id="kk_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form id="kk_modal_form" class="form" enctype="multipart/form-data">
                        <div class="messages"></div>
                        {{-- csrf token  --}}
                        @csrf
                        <input type="hidden" name="id">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3" id="kk_modal_title"></h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">Fill up the form and submit
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <div class="row mb-13">
                            <div class="col-md-6 order-1">
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2 required">
                                        <span>Thumbnail</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="card-body text-center pt-0">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('backend/media/blank-image.svg')}})">
                                            <!--begin::Preview existing icon-->
                                            <div class="image-input-wrapper w-150px h-150px"></div>
                                            <!--end::Preview existing icon-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change">
                                                <i class="fa fa-pencil-alt fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg, .webp" alt="blog image">
                                                <input type="hidden" name="icon_remove">
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel">
                                                <i class="fa fa-times fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove">
                                                <i class="fa fa-times fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Description-->
                                        <div class="help-block with-errors text-danger icon-error"></div>
                                        <div class="text-muted fs-7">Set the image of the Blog. Just *.png, *.jpg, *.webp and *.jpeg image files are accepted</div>
                                        <!--end::Description-->
                                    </div>

                                </div>
                                <!--end::Input group-->

                                <!--begin:: Title Input group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Blog Title</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="title" id="title" placeholder="Enter Blog Title" />
                                    <div class="help-block with-errors text-danger title-error"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin:: Title Input group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Author Name</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="author" id="author" placeholder="Enter Author Name" />
                                    <div class="help-block with-errors text-danger author-error"></div>
                                </div>
                                <!--end::Input group-->


                            </div>

                            <div class="col-md-6 order-3 order-md-2">

                                <!--begin:: Title Input group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span >Meta Title</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="meta_title" id="meta_title" placeholder="Enter Meta Title" />
                                    <div class="help-block with-errors text-danger meta_title-error"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin:: Title Input group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span >Meta Description</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea class="form-control form-control-solid" name="meta_description" id="meta_description"
                                    placeholder="Enter Meta Description" cols="30" rows="3"></textarea>
                                    <div class="help-block with-errors text-danger meta_description-error"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin:: Title Input group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span >Meta Keywords</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords" />
                                    <div class="help-block with-errors text-danger meta_keywords-error"></div>
                                </div>
                                <!--end::Input group-->
                                 <!--begin:: Status Select group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Status</span>
                                    </label>
                                    <!--end::Label-->
                                    <select class="form-control form-control-solid form-select form-select-solid" name="is_published" id="is_published"
                                        data-control="select2" data-hide-search="true">
                                        <option value="1" selected>Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                    <div class="help-block with-errors text-danger status-error"></div>
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="col-12 order-2 order-md-3">
                                <!--begin:: Title Input group-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Blog Content</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea class="form-control form-control-solid editor" name="content" id="content" placeholder="Enter Blog Content" ></textarea>
                                    <div class="help-block with-errors text-danger content-error"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>


                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kk_modal_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="kk_modal_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->

                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Product/Service-->

@endsection

<!-- Editor CSS -->
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
{{-- <script src="{{asset('backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script> --}}

<script>
    $(document).ready(function () {
        let table = $('#dataTable').DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ route('admin.blogs.index') }}",
                type: "GET",
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: "thumbnail",
                    render: function (data) {
                        let imageUrl = data
                            ? `${window.location.origin}/${data}`
                            : 'https://www.svgrepo.com/show/508699/landscape-placeholder.svg';

                        return `<img src="${imageUrl}" width="80" height="50" class="object-fit-cover rounded-3" />`;
                    },
                    orderable: false,
                    searchable: false
                },
                { data: 'title', name: 'title' },
                { data: 'author', name: 'author' },
                {
                    data: "is_published",
                    render: function (data) {
                        return data == 1
                            ? `<span class="badge badge-light-primary fw-bold">Active</span>`
                            : `<span class="badge badge-light-danger fw-bold">Deactive</span>`;
                    },
                    orderable: false,
                    searchable: false
                },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order: [[5, 'desc']]
        });

        const searchInput = document.querySelector('[data-kk-product-table-filter="search"]');
        if (searchInput) {
            searchInput.addEventListener("keyup", function (e) {
                table.search(e.target.value).draw();
            });
        }
    });

    // add new
    function addNew(){
        $('#kk_modal_title').text('{{__("Add Blog")}}')
        $('#content').summernote('code', '');
        $('input[name="id"]').val('')
        $('.with-errors').text('')
        $('.image-input').css('background-image','url({{ asset('backend/media/blank-image.svg')}})')
        $('.image-input-wrapper').css('background-image','url({{ asset('backend/media/blank-image.svg')}})')
        $('#kk_modal_form')[0].reset();
        $('textarea[name="meta_description"]').text('');
        $('select[name="is_published"]').val(1);
        $('#kk_modal').modal('show')
    }

    //save & update
    $('#kk_modal_form').on('submit',function(e){
        e.preventDefault()
        $('.with-errors').text('')

        var formData = new FormData(this);

        //ajax call
        $.ajax({
            type:"POST",
            url: "{{ route('admin.blogs.save')}}",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $('.indicator-label').hide()
                $('.indicator-progress').show()
                $('#kk_modal_submit').attr('disabled','true')
            },
            success:function(response){
                if(response.success ==  false || response.success ==  "false"){
                    var arr = Object.keys(response.errors);
                    var arr_val = Object.values(response.errors);
                    for(var i= 0;i < arr.length;i++){
                    $('.'+arr[i]+'-error').text(arr_val[i][0])
                    }
                }else if(response.error || response.error == 'true'){
                    var alertBox = '<div class="alert alert-danger" alert-dismissable">' + response.message + '</div>';
                    $('#kk_modal_form').find('.messages').html(alertBox).show();
                }else{
                    // empty the form
                    $('#kk_modal_form')[0].reset();
                    $("#kk_modal").modal('hide');

                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    }).then((function () {
                        //refresh datatable
                        $('#dataTable').DataTable().ajax.reload();
                    }))
                }
            },
            complete: function(){
                $('.indicator-label').show()
                $('.indicator-progress').hide()
                $('#kk_modal_submit').removeAttr('disabled')
            },
        });

    })

    //edit modal
    function edit(id){
        $('.with-errors').text('');
        $('#kk_modal_title').text("Update Blog")
        $.ajax({
            type:"GET",
            url: "{{ url('admin/blogs')}}"+'/'+id,
            dataType: 'json',
            success:function(response){
                var a = $('input[name="id"]').val(response.data.id);
                $('input[name="id"]').val(response.data.id)
                $('input[name="title"]').val(response.data.title)
                $('input[name="author"]').val(response.data.author)
                //set content in editor
                $('#content').summernote('code', response.data.content); 
                
                $('input[name="meta_keywords"]').val(response.data.meta_keywords)
                $('textarea[name="meta_description"]').text(response.data.meta_description)
                $('input[name="meta_title"]').val(response.data.meta_title)
                $('#is_published').val(response.data.is_published).trigger('change');
                let imageUrl = response.data.thumbnail ? `${window.location.origin}/${response.data.thumbnail}` : '';
                $('.image-input').css('background-image', 'url(' + imageUrl + ')');
                $('.image-input-wrapper').css('background-image', 'url(' + imageUrl + ')');
                $("#kk_modal").modal('show');
            }
        });
    }

    //delete
    function deleteBlog(id){
        Swal.fire({
            text: 'Are you sure you want delete this?',
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'No, cancel',
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            }
        }).then((function (o) {
            if(o.value){ //if agree
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/blogs/delete') }}"+'/'+id,
                    data: {},
                    success: function (res)
                    {
                        if(res.success){
                            Swal.fire({
                                text: res.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: 'Ok, got it!',
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            }).then((function () {
                                //refresh datatable
                                $('#dataTable').DataTable().ajax.reload();
                            }))
                        }
                    }
                });

            }else{ //if cancel
                Swal.fire({
                    text: 'Item has not been deleted',
                    icon: "error",
                    buttonsStyling: !1,
                    confirmButtonText: 'Ok, got it!',
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                })
            }

        }))
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'help']]
            ]
        });
    });
</script>

@endpush
