
@section('title', 'Services')
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
        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Services</h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
          <!--begin::Item-->
          <li class="breadcrumb-item text-muted">
            <a href="index.html" class="text-muted text-hover-primary">Home</a>
          </li>
          <!--end::Item-->
          <!--begin::Item-->
          <li class="breadcrumb-item text-muted">Services</li>
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
              <!--begin::Filter-->
              <div class="w-150px me-3">
                <!--begin::Select2-->
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                  <option></option>
                  <option value="all">All</option>
                  <option value="active">Active</option>
                  <option value="locked">Locked</option>
                </select>
                <!--end::Select2-->
              </div>
              <!--end::Filter-->

              <!--begin::Add Service-->
              <button type="button" id="add_service_btn" class="btn btn-primary">Add Service</button>
              <!--end::Add Service-->

            </div>
            <!--end::Toolbar-->
            <!--begin::Group actions-->
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
              <div class="fw-bold me-5">
              <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
              <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
            </div>
            <!--end::Group actions-->
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
                <th class="min-w-50px">ID</th>
                <th class="min-w-80px">Image</th>
                <th class="min-w-125px">Title</th>
                <th class="min-w-125px">Description</th>
                <th class="min-w-125px">Create Date</th>
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
<div class="modal fade" id="form_add_edit_modal" tabindex="-1" aria-hidden="true" >
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
              <form id="add_edit_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data" action="" method="">

                  <!--begin::Heading-->
                  <div class="mb-13 text-center">
                      <!--begin::Title-->
                      <h1 class="mb-3 form_title"></h1>
                      <!--end::Title-->
                  </div>
                  <!--end::Heading-->

                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                      <!--begin::Label-->
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Service Title</span>
                      </label>
                      <!--end::Label-->

                      <input type="text" class="form-control form-control-solid" placeholder="Enter Service Title" name="title">

                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  <!--end::Input group-->

                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                      Service Image
                    </label>
                    <!--end::Label-->

                    <input type="file" class="form-control" name="image">
                    
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>

                    <img id="preview_image" class="rounded-2" src="" width="100" />
                  </div>
                <!--end::Input group-->


                  <!--begin::Input group-->
                  <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                      <!--begin::Label-->
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Service Description</span>
                      </label>
                      <!--end::Label-->

                      <textarea name="description" placeholder="Write Description.." class="form-control form-control-solid"></textarea>

                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  <!--end::Input group-->

                  <!--begin::Actions-->
                  <div class="text-center">
                      <button type="reset" id="hr_cancel_btn" class="btn btn-light-danger me-3" data-bs-dismiss="modal">
                          Reset
                      </button>

                      <button type="submit" id="hr_submit_btn" class="btn btn-primary">
                          <span class="indicator-label">
                              Submit
                          </span>
                          <span class="indicator-progress">
                              Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
    var filterPayment;

    // Private functions
    var initDatatable = function () {
        dt = $("#hr_datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[4, 'desc']],
            stateSave: true,
            ajax: {
                url: "{{ route('admin.services.index')}}",
            },
            columns: [
                { data: 'id' },
                { data: 'image' },
                { data: 'title' },
                { data: 'description' },
                { data: 'created_at', visible: false, orderable: true },
                { data: null, orderable: false, searchable: false}
                
            ],
            columnDefs: [
              // Adding Actions
              {
                targets: -1,
                render: function (data, type, row) {
                    return `
                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 service_edit_btn"  data-id="${row.id}">
                            <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    
                        </a>

                        <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete" data-id="${row.id}">
                            <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    
                        </button>
                    `;
                }
              },
              // Showing Image
              {
                targets: 1,
                render: function( data, type, row){
                  let src = data 
                  ? `/storage/services/${data}` 
                  : 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg';
                  return `<img src="${src}" alt="Service Image" class="img-fluid" style="width: 100%; height: 50px; object-fit: cover;">`;
                } 
              }
              
            ],
        });
    }
    // Public methods

    
      
    // Add Service
    $('#add_service_btn').on('click', function() {
        // Show Form
        $('#add_edit_form')[0].reset();
        $('#preview_image').attr('src', '');
        $('.form_title').text('Add Service');
        $('#form_add_edit_modal').modal('show');
        $('#add_edit_form').attr('action', "{{ route('admin.services.store') }}");
        $('#add_edit_form').attr('method', 'POST');
    });

    // Submit Form
    $('#add_edit_form').on('submit', function (e) {

      e.preventDefault();

      let action = $('#add_edit_form').attr('action');
      let method = $('#add_edit_form').attr('method');

      let formData = new FormData($('#add_edit_form')[0]);

      $.ajax({
        url: action,
        type: method,
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          if (response.success  ) {
            toastr.success(response.message);
            $('#form_add_edit_modal').modal('hide');
            $('#add_edit_form')[0].reset();
            dt.ajax.reload();
          } else {
            toastr.error(response.message || 'Something went wrong!');
          }
        },
        error: function (errors) {
          toastr.error('Validation failed or server error');
        }
      });
    });

    // Edit Service
    $('#hr_datatable').on('click', '.service_edit_btn', function(e) {
      
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            url: `{{ url('admin/services') }}/${id}/edit`,
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    $('.form_title').text('Edit Service');
                    $('#form_add_edit_modal').modal('show');
                    $('#service_id').val(response.data.id);
                    $('#add_edit_form input[name="title"]').val(response.data.title);
                    $('#add_edit_form textarea[name="description"]').val(response.data.description);
                    // Preview Image 
                    let src = response.data && response.data.image
                     ? `/storage/services/${response.data.image}` 
                     : '/frontend/assets/images/placeholder.svg';
                    $('#preview_image').attr('src', src);
                    // Declaring Action and Method 
                    $('#add_edit_form').attr('action', `{{ url('admin/services') }}/${id}`);
                    $('#add_edit_form').attr('method', 'POST');

                } else {  
                    toastr.error(response.message || 'Something went wrong!');
                }
            },
            error: function(errors) {
                toastr.error('Validation failed or server error');
            }
        });
    });

    //Delete Service
    $('#hr_datatable').on('click', '.btn-delete', function(e) {
        e.preventDefault();

        let id = $(this).data('id');

        Swal.fire({
            text: "Are you sure you want to delete this service?",
            icon: "warning",
            buttonsStyling: false,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            showCancelButton: true,
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: `{{ url('admin/services') }}/${id}`,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            dt.ajax.reload();
                        } else {
                            toastr.error(response.message || 'Something went wrong!');
                        }
                    },
                    error: function(errors) {
                        toastr.error('Validation failed or server error');
                    }
                });
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "You've Cancel the Deletion!",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    }); 


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