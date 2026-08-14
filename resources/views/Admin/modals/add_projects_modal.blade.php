@php($isEdit = !empty($project))
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary">
            <h4 class="modal-title" id="primary-header-modalLabel">{{ $isEdit ? 'Edit Project' : 'Add New Project' }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form class="form-horizontal" id="ajax-form" method="POST"
              action="{{ $isEdit ? route('update.projects', ['id' => $project->id]) : route('save.projects') }}"
              data-table="projects-table" enctype="multipart/form-data" data-file="true">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3 client_type">
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Choose Project Images</label>
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
                                    <label class="col-3 col-form-label">Project Status</label>
                                    <div class="col-9">
                                        @php($selectedType = old('type', $project->type ?? 'COMPLETED PROJECT'))
                                        <select class="form-select @error('type') is-invalid @enderror" name="type">
                                            <option value="COMPLETED PROJECT" {{ $selectedType === 'COMPLETED PROJECT' ? 'selected' : '' }}>Completed Project</option>
                                            <option value="ONGOING PROJECT" {{ $selectedType === 'ONGOING PROJECT' ? 'selected' : '' }}>Ongoing Project</option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Project Title</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $project->title ?? '') }}" placeholder="Enter Title" autocomplete="Enter title">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Address</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $project->location ?? '') }}" placeholder="Enter address" autocomplete="Enter address">
                                        @error('location')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Project Category</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category', $project->category ?? '') }}" placeholder="Commercial / Residential / Industrial" autocomplete="Enter category">
                                        @error('category')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Project Year</label>
                                    <div class="col-9">
                                        <input type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year', $project->year ?? '') }}" placeholder="2024" min="1900" max="{{ now()->addYears(5)->format('Y') }}">
                                        @error('year')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Project Overview</label>
                                    <div class="col-9">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4" placeholder="Enter project overview">{{ old('description', $project->description ?? '') }}</textarea>
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
