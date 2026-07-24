@php($isEdit = !empty($service))
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary">
            <h4 class="modal-title" id="primary-header-modalLabel">{{ $isEdit ? 'Edit Service' : 'Add New Service' }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form class="form-horizontal" id="ajax-form" method="POST"
              action="{{ $isEdit ? route('update.service', ['id' => $service->id]) : route('save.service') }}"
              data-table="service-table" enctype="multipart/form-data" data-file="true">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3 client_type">
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Choose Image</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control" name="image" id="image">
                                        @if($isEdit && $service->image)
                                            <span class="admin-current-file">Current: {{ $service->image }}</span>
                                        @endif
                                        @error('Choose Image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Icon</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon', $service->icon ?? '') }}" placeholder="Enter Icon" autocomplete="Enter Icon">
                                        @error('Enter icon')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Your Title</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $service->title ?? '') }}" placeholder="Enter title" autocomplete="Enter Title">
                                        @error('Enter title')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Your Description</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $service->description ?? '') }}" placeholder="Enter Description" autocomplete="Enter Description">
                                        @error('Enter description')
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
