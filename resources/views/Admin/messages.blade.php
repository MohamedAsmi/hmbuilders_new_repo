@extends('Admin.layouts.app')
@section('page-title', 'Message List')
@section('breadcrumb')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Messages</li>
    </ol>
@endsection
@section('body')

<div class="row">

    <div class="col-md-12">
        <div class="card border-success border">
            <div class="card-body">
                <div class="row col-md-12 mb-4">
                    <div class="col"> <h5 class="card-title text-success">Meesages</h5></div>
                
                </div>
         
                </div>
               
                <table id="message-table" class="table table-md-12" data-url="{{ route('messages.list') }}">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
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
<script src="{{ asset('js/admin/messages.js?t=' . config('app.t')) }}"></script>
@endpush
