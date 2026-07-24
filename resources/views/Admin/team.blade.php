@extends('Admin.layouts.app')
@section('page-title', 'Member List')
@section('breadcrumb')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Members</li>
    </ol>
@endsection
@section('body')

<div class="row">

    <div class="col-md-12">
        <div class="card border-success border">
            <div class="card-body">
                <div class="row col-md-12 mb-4 admin-section-header">
                    <div class="col"> <h5 class="card-title text-success">Our Members</h5></div>
                    <div class="col text-end">
                        <a href="javascript:void(0)" class="load-modal" title="Add"
                            data-url="{{route('team.modal')}}">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"> Add New Member</i></span> 
                        </button> </a>
                </div>
         
                </div>
               
               


                <div class="table-responsive admin-table-responsive">
                <table class="table table-bordered yajra-datatable nowrap w-100" id="team-table" data-url="{{ route('team.list') }}">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Qualification</th>
                            <th>Position</th>
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
<script src="{{ asset('js/admin/team.js?t=' . config('app.t')) }}"></script>
@endpush
