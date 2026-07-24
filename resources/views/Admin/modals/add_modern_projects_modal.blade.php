@php($isEdit = !empty($project))
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary">
            <h4 class="modal-title" id="primary-header-modalLabel">{{ $isEdit ? 'Edit Project' : 'Add New Project' }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form class="form-horizontal" id="ajax-form" method="POST"
              action="{{ $isEdit ? route('update.ModernProjects', ['id' => $project->id]) : route('save.ModernProjects') }}"
              data-table="modal-projects-table" enctype="multipart/form-data" data-file="true">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3 client_type">
                            <div class="row mb-3">
                                <label class="col-3 col-form-label">Enter Project Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $project->name ?? '') }}" placeholder="Enter Name" autocomplete="Enter Name">
                                    @error('Enter type')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Choose Project Images</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control" name="image" id="image">
                                        @if($isEdit && $project->image_path)
                                            <span class="admin-current-file">Current: {{ $project->image_path }}</span>
                                        @endif
                                        @error('Choose Image')
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
