@extends('Admin.layouts.app')
@section('page-title', 'Modern Plans')
@section('breadcrumb')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Modern Plans</li>
    </ol>
@endsection
@section('body')

<div class="row">
    <div class="col-md-12">
        <div class="card border-success border">
            <div class="card-body">
                <div class="row col-md-12 mb-4 admin-section-header">
                    <div class="col"> <h5 class="card-title text-success">Modern Plans</h5></div>
                    <div class="col text-end">
                        <a href="javascript:void(0)" class="load-modal" title="Add"
                            data-url="{{route('ModernProjects.modal')}}">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"> Add New Plans</i></span> 
                        </button> </a>
                </div>
                
                </div>
               
                <div class="table-responsive admin-table-responsive">
                <table id="modal-projects-table" class="table table-bordered nowrap w-100" data-url="{{ route('ModernProjects.list') }}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection
@push('js')
<script src="{{ asset('js/admin/ModernProjects.js?t=' . config('app.t')) }}"></script>
@endpush
