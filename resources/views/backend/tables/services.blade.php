
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
<table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
  <thead>
  <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
      <th class="w-10px pe-2">
          <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
              <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1"/>
          </div>
      </th>
      <th>Customer Name</th>
      <th>Email</th>
      <th>Company</th>
      <th>Payment Method</th>
      <th>Created Date</th>
      <th class="text-end min-w-100px">Actions</th>
  </tr>
  </thead>
  <tbody class="text-gray-600 fw-semibold">
  </tbody>
</table>
<!--end::Datatable-->
      </div>
      <!--end::Content container-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::Content wrapper-->
  <!--begin::Footer-->
  <div id="kt_app_footer" class="app-footer">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
      <!--begin::Copyright-->
      <div class="text-gray-900 order-2 order-md-1">
        <span class="text-muted fw-semibold me-1">2024&copy;</span>
        <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
      </div>
      <!--end::Copyright-->
      <!--begin::Menu-->
      <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
        <li class="menu-item">
          <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
        </li>
        <li class="menu-item">
          <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
        </li>
        <li class="menu-item">
          <a href="https://1.envato.market/Vm7VRE" target="_blank" class="menu-link px-2">Purchase</a>
        </li>
      </ul>
      <!--end::Menu-->
    </div>
    <!--end::Footer container-->
  </div>
  <!--end::Footer-->
</div>
@endsection 