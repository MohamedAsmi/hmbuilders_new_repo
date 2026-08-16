@php
    $isEdit = !empty($service);
    $currentIcon = trim((string) ($service->icon ?? ''));
    $currentIconPath = parse_url($currentIcon, PHP_URL_PATH) ?: $currentIcon;
    $currentIconIsImage = $currentIcon !== '' && preg_match('/\.(svg|png|jpe?g|gif|webp)$/i', $currentIconPath);
    $iconTextValue = old('icon', $currentIconIsImage ? '' : $currentIcon);
@endphp
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
                                    <label class="col-3 col-form-label">Icon Image</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control @error('icon_image') is-invalid @enderror" name="icon_image" id="icon_image" accept="image/*">
                                        @if($isEdit && $currentIconIsImage)
                                            <span class="admin-current-file">Current icon image: {{ $currentIcon }}</span>
                                        @endif
                                        @error('icon_image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Icon Text/Class</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ $iconTextValue }}" placeholder="flaticon-architect or BC" autocomplete="off">
                                        <small class="text-muted">Upload an icon image, or enter an icon class/text. Image upload replaces this value.</small>
                                        @error('icon')
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
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Detail Points</label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('features') is-invalid @enderror" name="features" rows="4" placeholder="Enter one point per line">{{ old('features', $service->features ?? '') }}</textarea>
                                        <small class="text-muted">These points show in the lower service detail section. Add one point per line.</small>
                                        @error('features')
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
