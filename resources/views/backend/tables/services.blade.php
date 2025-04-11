
@section('title', 'Services')
@extends('backend.layouts.base-app')
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
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
            <li class="breadcrumb-item">
              <span class="bullet bg-gray-500 w-5px h-2px"></span>
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
        <!--begin::Wrapper-->
    <div class="d-flex flex-stack mb-5">
      <!--begin::Search-->
      <div class="d-flex align-items-center position-relative my-1">
          <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span class="path2"></span></i>
          <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers"/>
      </div>
      <!--end::Search-->

      <!--begin::Toolbar-->
      <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
          <!--begin::Filter-->
          <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="tooltip" title="Coming Soon">
              <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i>
              Filter
          </button>
          <!--end::Filter-->

          <!--begin::Add customer-->
          <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="Coming Soon">
              <i class="ki-duotone ki-plus fs-2"></i>
              Add Customer
          </button>
          <!--end::Add customer-->
      </div>
      <!--end::Toolbar-->

      <!--begin::Group actions-->
      <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
          <div class="fw-bold me-5">
              <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
          </div>

          <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="Coming Soon">
              Selection Action
          </button>
      </div>
      <!--end::Group actions-->
    </div>
    <!--end::Wrapper-->

    <!--begin::Datatable-->
    <table id="#hr_datatable" class="table align-middle table-row-dashed fs-6 gy-5">
      <thead>
      <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
          <th class="w-10px pe-2">
              <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                  <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#hr_datatable .form-check-input" value="1"/>
              </div>
          </th>
          <th width="25%">Title</th>
          <th width="40%">Short Description</th>
          <th>Created Date</th>
          <th class="text-end min-w-100px">Actions</th>
      </tr>
      </thead>
    </table>
    <!--end::Datatable-->
      </div>
      <!--end::Content container-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::Content wrapper-->
</div>
@endsection 

@push('scripts')

<script>

// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var dt;

    // Private functions
    var initDatatable = function () {
      dt = $("#hr_datatable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{ route('admin.services.index') }}",
                type: 'GET'
            },
            columns: [
                { data: 'title' },
                { data: 'description' },
                { data: 'created_at' },
                { data: null, orderable: false, searchable: false },
            ],
            // columnDefs: [
            //     {
            //         targets: 0,
            //         orderable: false,
            //         render: function (data) {
            //             return `
            //                 <div class="form-check form-check-sm form-check-custom form-check-solid">
            //                     <input class="form-check-input" type="checkbox" value="${data}" />
            //                 </div>`;
            //         }
            //     },
            // ],
        });

    }

  
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