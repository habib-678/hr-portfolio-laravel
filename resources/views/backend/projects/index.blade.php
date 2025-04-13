@section('title', 'Projects')
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
          <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Projects</h1>
          <!--end::Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
              <a href="index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Projects</li>
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
                <button type="button" id="add_project_btn" class="btn btn-primary">Add Projects</button>
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
                  <th class="min-w-50px">#</th>
                  <th class="min-w-80px">Image</th>
                  <th class="min-w-125px">Category</th>
                  <th class="min-w-125px">Project Name</th>
                  <th class="min-w-125px">Cleint Name</th>
                  <th class="min-w-125px">Status</th>
                  <th class="min-w-125px">Published At</th>
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
  
                    @csrf
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
                        <button type="reset" id="hr_cancel_btn" class="btn btn-light-danger me-3" >
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

            // Private functions
            var initDatatable = function () {
                dt = $("#hr_datatable").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    order: [[5, 'desc']],
                    stateSave: true,
                    ajax: {
                        url:"{{ route('admin.projects.index') }}",
                        type:"GET"
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'image' },
                        { data: 'category' },
                        { data: 'project' },
                        { data: 'client' },
                        { data: 'is_active' },
                        { data: 'created_at' },
                        { data: null },
                    ],
                    columnDefs: [
                        {
                            targets: -1,
                            orderable: false,
                            className: 'text-end',
                            render: function (data, type, row) {
                                return `
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 service_edit_btn">
                                        <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    
                                    </a>

                                    <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete">
                                        <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    
                                    </button>
                                `;
                            },
                        },
                    ],
                    // Add data-filter attribute
                    createdRow: function (row, data, dataIndex) {
                        $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
                    }
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function () {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                filterSearch.addEventListener('keyup', function (e) {
                    dt.search(e.target.value).draw();
                });
            }

            let modal = $('#form_add_edit_modal');
            //Add Project Modal Open
            $('#add_project_btn').on('click', function(){
                $('.form_title').text('Add New Project');
                modal.modal('show');
            });

            //Add New Project
            $('#add_edit_form').on('submit', function(e){
                e.preventDefault();
            })

            // Public methods
            return {
                init: function () {
                    initDatatable();
                    handleSearchDatatable();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTDatatablesServerSide.init();
        });
    </script>
@endpush