@extends('Admin.layouts.app')
@section('page-title', 'Dashboard')
@section('breadcrumb')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection
@section('body')

<div class="row">

    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$team}}</h3>
  
                  <p>Team Members</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="text-end p-1" style="visibility: hidden">
                  <span class="badge badge-pill badge-success">No New</span>
                </div >
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$service}}</h3>
  
                  <p>Services</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building"></i>
                </div>

                  <div class="text-end p-1" style="visibility: hidden">
                    <span class="badge badge-pill badge-success">No New</span>
                  </div >
                
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$inquire}}</h3>
  
                  <p>Inquires</p>
                </div>
                <div class="icon">
                  <i class="fa fa-question-circle"></i>
                </div>
                @if($inquirestatus > 0)
                <div class="text-end p-1">
                  <span class="badge badge-pill badge-success">{{$inquirestatus}} New</span>
                </div>
                @else
                  <div class="text-end p-1" style="visibility: hidden">
                    <span class="badge badge-pill badge-success">No New</span>
                  </div >
                @endif
                <a href="{{route('ListInquires')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$contact}}</h3>
  
                  <p>Contact Messages</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                @if($contactstatus > 0)
                <div class="text-end p-1">
                  <span class="badge badge-pill badge-success">{{$contactstatus}} New</span>
                </div>
                @else
                  <div class="text-end p-1" style="visibility: hidden">
                    <span class="badge badge-pill badge-success">No New</span>
                  </div >
                @endif
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
           
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                Please check the website statistics fields and try again.
            </div>
        @endif

        <div class="card" id="website-statistics">
            <div class="card-header">
                <h4 class="header-title mb-0">Website Statistics</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('site-stats.update') }}">
                    @csrf
                    <div class="row">
                        @foreach($siteStats as $stat)
                            <div class="col-xl-3 col-md-6">
                                <div class="border rounded p-3 mb-3">
                                    <label class="form-label">Label</label>
                                    <input type="text" name="stats[{{ $stat->key }}][label]" class="form-control @error('stats.' . $stat->key . '.label') is-invalid @enderror" value="{{ old('stats.' . $stat->key . '.label', $stat->label) }}" required>

                                    <label class="form-label mt-3">Number</label>
                                    <input type="number" name="stats[{{ $stat->key }}][value]" class="form-control @error('stats.' . $stat->key . '.value') is-invalid @enderror" value="{{ old('stats.' . $stat->key . '.value', $stat->value) }}" min="0" required>

                                    <label class="form-label mt-3">Suffix</label>
                                    <input type="text" name="stats[{{ $stat->key }}][suffix]" class="form-control @error('stats.' . $stat->key . '.suffix') is-invalid @enderror" value="{{ old('stats.' . $stat->key . '.suffix', $stat->suffix) }}" maxlength="8" placeholder="+">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save Website Statistics</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@push('js')
<script src="{{ asset('js/admin/team.js?t=' . config('app.t')) }}"></script>
@endpush
