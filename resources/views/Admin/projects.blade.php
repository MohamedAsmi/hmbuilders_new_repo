@extends('Admin.layouts.app')
@section('page-title', 'Projects List')
@section('breadcrumb')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Projects</li>
    </ol>
@endsection
@section('body')

<div class="row">

    <div class="col-md-12">
        <div class="card border-success border">
            <div class="card-body">
                <div class="row col-md-12 mb-4">
                    <div class="col"> <h5 class="card-title text-success">Our Projects</h5></div>
                    <div class="col text-end">
                        <a href="javascript:void(0)" class="load-modal" title="Edit"
                            data-url="{{route('projects.modal')}}">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="fa fa-plus"> Add New Projects</i></span> 
                        </button> </a>
                </div>
         
                </div>
               
                <table id="projects-table" class="table table-md-12" data-url="{{ route('projects.list') }}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Image</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>








@endsection
@push('js')
<script src="{{ asset('js/admin/projects.js?t=' . config('app.t')) }}"></script>
@endpush
