<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary">
            <h4 class="modal-title" id="primary-header-modalLabel">Add New Member</h4>
            <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form class="form-horizontal" id="ajax-form" method="POST"
              action="{{route('save.member')}}"
              data-table="team-table" data-file="true">
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
                                        @error('Choose Image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Name</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Enter Name" autocomplete="Enter Name">
                                        @error('Enter Name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Qualification</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="" placeholder="Enter Qualification" autocomplete="Enter Qualification">
                                        @error('Enter qualification')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Enter Position</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="" placeholder="Enter Position" autocomplete="Enter Position">
                                        @error('Enter position')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-8">
                    @if(session('message_for') == 'add_member_modal')
                    @include('common.alert')
                    @endif
                </div>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-loading-text="Saving...">Save</button>
            </div>
        </form>
    </div>
</div>
