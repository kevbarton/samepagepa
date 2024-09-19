@extends('layouts.admin')
@section('pagetitle','Samepage Dashboard - Vehicle Types')
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
                    <li class="breadcrumb-item text-muted">Vehicle Types</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{route('dashboard.vehicletypes.add')}}" class="btn btn-sm fw-bold btn-primary" >Create</a>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                <div class="card-body p-0">
                    <div class="card-px py-20 my-10 table-responsive">
                        <h3 class="fs-2x fw-bold mb-10">Vehicle Types</h3>
                        <table class="table" id="vehicletypetable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th >{{__('Name')}}</th>

                                        <th class="text-end">{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endpush
@push('scripts')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $("#vehicletypetable").DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('dashboard.vehicletypes.list') !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'actions', name: 'actions',sortable:false},
        ]
    });
});
</script>
@endpush