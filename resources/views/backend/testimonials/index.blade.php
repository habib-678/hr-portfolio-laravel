
@section('title', 'Testmonial')
@extends('backend.layouts.base-app')
@section('content')
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
          <!--begin::Title-->
          <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Testmonial</h1>
          <!--end::Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
              <a href="index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Testmonial</li>
            <!--end::Item-->
          </ul>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
      </div>
      <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
      <!--begin::Content container-->
      <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
          <!--begin::Card header-->
          <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
              <!--begin::Search-->
              <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Customers" />
              </div>
              <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
              <!--begin::Toolbar-->
              <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <!--end::Filter-->
  
                <!--begin::Add Service-->
                <button type="button" id="add_review_btn" class="btn btn-primary">Add Testmonial</button>
                <!--end::Add Service-->
  
              </div>
              <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="hr_datatable">
              <thead>
                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                  <th>#</th>
                  <th class="min-w-80px">Client Name</th>
                  <th class="min-w-125px">Designation</th>
                  <th class="min-w-300px">Feedback</th>
                  <th>Rates</th>
                  <th>Status</th>
                  <th class="min-w-80px">Client</th>
                  <th class="min-w-80px">Logo</th>
                  <th class="text-end min-w-70px">Actions</th>
                </tr>
              </thead>
              <!--end::Table body-->
            </table>
            <!--end::Table-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Card-->
      </div>
      <!--end::Content container-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::Content wrapper-->
  
  <!--begin::Modals-->
  <div class="modal fade" id="form_add_edit_modal" >
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                
                  </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
  
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="add_edit_form" class="form" enctype="multipart/form-data">

                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3" id="form_title"></h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Fill up the form and submit</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <input type="hidden" name="project_id" id="project_id">

                    <!--begin:: Title Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Client Name</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" name="client_name" id="client_name" placeholder="Enter Client Name">

                        <div class="invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->

                    <!--begin:: Title Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Designation</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" name="designation" id="designation" placeholder="Enter Designation">

                        <div class="invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->

                    <!--begin:: Title Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Feedback</span>
                        </label>
                        <!--end::Label-->
                        <textarea class="form-control form-control-solid" name="feedback" id="feedback" placeholder="Enter Feedback"></textarea>

                        <div class="invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin:: Title Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            Rates
                        </label>
                        <!--end::Label-->
                        <label for="rating">Client Rating (out of 5)</label>
                        <input type="number"  class="form-control form-control-solid"  name="rating" id="rating" step="0.1" min="0" max="5">
                    <!--end::Input group-->
                    </div>

                    <!--begin:: Status Select group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span>Status</span>
                        </label>
                        <!--end::Label-->
                        <select class="form-control form-control-solid" name="is_active" id="is_active">
                            <option value="1">Active</option>
                             <option value="0">Deactive</option>
                        </select>
                        <div class="help-block with-errors status-error"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            Client Image
                            </label>
                            <!--end::Label-->

                            <input type="file" class="form-control" name="client_image" id="client_image">

                            <img id="client_preview_image" class="rounded-2 bg-white shadow-sm mt-2 p-3" 
                            src="" 
                            width="100" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            Company Logo
                            </label>
                            <!--end::Label-->

                            <input type="file" class="form-control" name="company_logo" id="company_logo">

                            <img id="logo_preview_image" class="rounded-2 bg-white shadow-sm mt-2 p-3" src="" width="100" />
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="hr_form_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="hr_form_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
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
  <!--end::Modals-->
@endsection

@push('scripts')
<script>


// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;

    // Private functions
    var initDatatable = function () {
        dt = $("#hr_datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[-1, 'desc']],
            stateSave: true,
            ajax: {
                url: "{{route('admin.testimonials.index')}}",
            },
            columns: [
                { data: 'id' },
                { data: 'client_name' },
                { data: 'designation' },
                { data: 'feedback' },
                { data: 'rating' },
                { data: 'is_active' },
                { data: 'company_logo' },
                { data: 'client_image' },
                { data: null },
            ],
            columnDefs: [

                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        return `
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn" data-id="${row.id}">
                                    <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    
                                </a>

                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete" data-id="${row.id}">
                                    <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    
                                </button>
                            `;
                    },
                },
                {
                    targets: 5,
                    render: function(data, type, row){
                        if(data == 1){
                            return `<span class="badge badge-light-primary">Active</span>`;
                        }else{
                            return `<span class="badge badge-light-danger">Inactive</span>`;
                        }
                        
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row){
                        let src = data ? `storage/testimonial/${data}` : 'https://placehold.co/600x400/EEE/31343C';
                        return `<img src="${src}" width="100%" class="rounded-3">`;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row){
                        let src = data ? `storage/testimonial/${data}` : 'https://placehold.co/600x400/EEE/31343C';
                        return `<img src="${src}" width="100%" class="rounded-3">`;
                    }
                }
            ],

        });

    }



    let modal = $('#form_add_edit_modal');
    let form = $('#add_edit_form');

    //Open Form modal
    $('#add_review_btn').on('click', function(e){
        $('#form_title').text('Add New Review')
        form[0].reset();
        $('#client_preview_image , #logo_preview_image').attr('src', '');
        $(`#add_edit_form input, #add_edit_form textarea`).removeClass('is-invalid');
        $(`#add_edit_form input, #add_edit_form textarea`).next('.invalid-feedback').text('');
        form.attr('action', `{{route('admin.testimonials.store')}}`);
        form.attr('method', 'POST');
        modal.modal('show');
    });

    //Add or Update Review
    form.on('submit', function(e){
        e.preventDefault();

        let action = form.attr('action');
        let method = form.attr('method');
        console.log(action)

        let formData = new FormData($('#add_edit_form')[0]);

        $.ajax({
            url: action,
            type: method,
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function(){
                //show loader
                $('#hr_form_submit')[0].setAttribute("data-kt-indicator", "on");
            },
            success:function(response){
                console.log(response)
                if(response.success){
                    setTimeout(() => {
                        modal.modal('hide');
                        form[0].reset();
                        $(`#add_edit_form input, #add_edit_form textarea`).removeClass('is-invalid');
                        $(`#add_edit_form input, #add_edit_form textarea`).next('.invalid-feedback').text('');
                        dt.ajax.reload();
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                        $('#hr_form_submit')[0].removeAttribute("data-kt-indicator");
                    }, 1000);
                    
                }
            },
            error: function(res){
                if(res.responseJSON && res.responseJSON.errors){
                    setTimeout(()=>{
                        $(`#add_edit_form input, #add_edit_form textarea`).removeClass('is-invalid');
                        $(`#add_edit_form input, #add_edit_form textarea`).next('.invalid-feedback').text('');
                        let errors = res.responseJSON.errors;
                        for(let key in errors){
                            $(`#add_edit_form [name="${key}"]`).addClass('is-invalid');
                            $(`#add_edit_form [name="${key}"]`).next('.invalid-feedback').text(errors[key][0]);
                        };
                        $('#hr_form_submit')[0].removeAttribute("data-kt-indicator")
                    }, 500);
                }
                   
            }

        })
    });

    //Edit Form
    $('#hr_datatable').on('click', '.edit-btn', function(e){
        e.preventDefault();

        let rowId = $(this).data('id');

        $.ajax({
            url: `{{url('admin/testimonials/edit')}}/${rowId}`,
            type: "GET",
            success: function(response){    
                if(response.rowData){
                    //clear errors
                    $(`#add_edit_form input, #add_edit_form textarea`).removeClass('is-invalid');
                    $(`#add_edit_form input, #add_edit_form textarea`).next('.invalid-feedback').text('');
                    
                    $('#form_title').text('Edit Review!')
                    form.attr('action', `{{url('admin/testimonials')}}/${rowId}`);
                    form.attr('method', 'POST');

                    //getting datas
                    form.find('input[name="client_name"]').val(response.rowData.client_name)
                    form.find('input[name="designation"]').val(response.rowData.designation)
                    form.find('textarea[name="feedback"]').val(response.rowData.feedback)
                    form.find('input[name="rating"]').val(response.rowData.rating)
                    form.find('select[name="is_active"]').val(response.rowData.is_active)

                    let client_src = response.rowData.client_image ? `storage/testimonial/`+response.rowData.client_image : 'https://placehold.co/600x400/EEE/31343C';
                    form.find('#client_preview_image').attr('src', client_src)

                    let logo_src = response.rowData.company_logo ? `storage/testimonial/`+response.rowData.company_logo : 'https://placehold.co/600x400/EEE/31343C';
                    form.find('#logo_preview_image').attr('src', logo_src)

                    modal.modal('show');
                }
            }
        }); //ajax
        
    })

    //Delete
    $('#hr_datatable').on('click', '.btn-delete', function(e){
        e.preventDefault();
        let rowId = $(this).data('id');

        Swal.fire({
            text:'Are you sure you want to delete this Review?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ok, got it!",
            cancelButtonText: 'Nope, cancel it',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then(function(result){
            if(result.isConfirmed){
                $.ajax({
                    url: `{{url('admin/testimonials')}}/${rowId}`,
                    type: "DELETE",
                    success: function(response){        
                        if(response.success){
                            toastr.success(response.message);
                            dt.ajax.reload();
                        }
                    }
                }); //ajax
            }
        }); //swal
        
    })


    // Public methods
    return {
        init: function () {
            initDatatable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
  </script>
@endpush