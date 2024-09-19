@extends('layouts.admin')
@section('pagetitle','Samepage Dashboard - Create Vehicle type')
@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('dashboard.index')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Create Vehicle Type</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                {{-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a> --}}
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body p-0">
                    <div class="card-px py-20 my-10 table-responsive">
                        <h3 class="fs-2x fw-bold mb-10">Create Vehicle Type</h3>
                        <form action="{{route('dashboard.vehicletypes.save')}}" method="post" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                            @csrf
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Name</span>
                                </label>
                                <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="">
                                    @error('name')
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">{{$message}}</div>
                                    @enderror
                            </div>
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Description</span>
                                </label>
                                <textarea class="form-control form-control-solid" name="description"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('dashboard.vehicletypes.index')}}" class="btn btn-light me-3">Cancel</a>
                                <button type="submit"  class="btn btn-primary">
                                    <span class="indicator-label">Save</span>
                                </button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
