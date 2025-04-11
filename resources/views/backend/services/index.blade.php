
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
              <button type="button" id="add_service_btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_add_edit_modal" onclick="add()">Add Service</button>
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
<div class="modal fade" id="form_add_edit_modal" tabindex="-1" aria-hidden="true" style="display: none;">
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-650px">
      <!--begin::Modal content-->
      <div class="modal-content rounded">
          <!--begin::Modal header-->
          <div class="modal-header pb-0 border-0 justify-content-end">
              <!--begin::Close-->
              <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                  <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
              <!--end::Close-->
          </div>
          <!--begin::Modal header-->

          <!--begin::Modal body-->
          <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
              <!--begin:Form-->
              <form id="add_edit_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                <input type="hidden" name="id" id="service_id">


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
                        <span class="required">Service Description</span>
                      </label>
                      <!--end::Label-->

                      <textarea name="description" placeholder="Write Description.." class="form-control form-control-solid"></textarea>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  <!--end::Input group-->

                  <!--begin::Actions-->
                  <div class="text-center">
                      <button type="reset" id="hr_cancel_btn" class="btn btn-light me-3">
                          Cancel
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
  "use strict";

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
            order: [[5, 'desc']],
            stateSave: true,
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },
            ajax: {
                url: "{{ route('admin.services.index')}}",
            },
            columns: [
                { data: 'id' },
                { data: 'image' },
                { data: 'title' },
                { data: 'description' },
                { data: 'created_at' },
                { data: null, orderable: false, searchable: false}
                
            ],
            columnDefs: [
              {
                targets: -1,
                render: function (data, type, row) {
                    return `
                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                          <i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i>                                    
                        </a>

                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"  data-id="${row.id}">
                            <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    
                        </a>

                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                            <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    
                        </a>
                    `;
                }
              }
            ],
        });
    }
    // Public methods

    $(document).ready(function () {

      // Show Form
      $('#add_service_btn').on('click', function () {
        $('.form_title').text('Add Service');
        $('#form_add_edit_modal').modal('show');
      });
    
      // Submit Form
      $('#add_edit_form').on('submit', function (e) {

        e.preventDefault();
    
        let formData = new FormData($('#add_edit_form')[0]);
    
        $.ajax({
          url: "{{ route('admin.services.store') }}",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            if (response.status == 'success') {
              toastr.success(response.message);
              $('#form_add_edit_modal').modal('hide');
              $('#add_edit_form')[0].reset();
              dt.ajax.reload();
            } else {
              toastr.error(response.message || 'Something went wrong!');
            }
          },
          error: function (xhr) {
            console.log(xhr);
            toastr.error('Validation failed or server error');
          }
        });
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