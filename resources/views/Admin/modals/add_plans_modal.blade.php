@php($isEdit = !empty($plan))
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary">
            <h4 class="modal-title" id="primary-header-modalLabel">{{ $isEdit ? 'Edit Plan' : 'Add New Plan' }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form class="form-horizontal" id="ajax-form" method="POST"
              action="{{ $isEdit ? route('update.plan', ['id' => $plan->id]) : route('save.plan') }}"
              data-table="plans-table" enctype="multipart/form-data" data-file="true">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3 client_type">
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Choose Plans Images</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control" name="image[]" id="image" multiple>
                                        @if($isEdit && $images->count())
                                            <span class="admin-current-file">Current: {{ $images->implode(', ') }}</span>
                                        @endif
                                        @error('image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Plan Type</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type', $plan->type ?? '') }}" placeholder="Enter Type" autocomplete="Enter type">
                                        @error('type')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Plans Title</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $plan->title ?? '') }}" placeholder="Enter Title" autocomplete="Enter title">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Address</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $plan->location ?? '') }}" placeholder="Enter address" autocomplete="Enter address">
                                        @error('location')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Plan Overview</label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" placeholder="Enter plan overview">{{ old('description', $plan->description ?? '') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <div class="col-md-8">
                            @if(session('message_for') == 'add_service')
                            @include('common.alert')
                            @endif
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary float-end" data-loading-text="Saving...">{{ $isEdit ? 'Update' : 'Add' }}</button>
                        </div>
                    </div>
                    <div id="message-area"></div>
                </div>
            </div>
           
        </form>
    </div>
</div>
