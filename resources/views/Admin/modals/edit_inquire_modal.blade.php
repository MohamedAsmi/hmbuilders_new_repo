<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary">
            <h4 class="modal-title" id="primary-header-modalLabel">Edit Inquire</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-hidden="true"></button>
        </div>
        <form class="form-horizontal" id="ajax-form" method="POST"
              action="{{ route('update.inquires', ['id' => $inquire->id]) }}"
              data-table="inquire-table" data-file="false">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">First Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname', $inquire->fname) }}" placeholder="First Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Last Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname', $inquire->lname) }}" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Mobile</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $inquire->mobile) }}" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Service</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('service') is-invalid @enderror" name="service" value="{{ old('service', $inquire->service) }}" placeholder="Service">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label">Message</label>
                            <div class="col-9">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4" placeholder="Message">{{ old('message', $inquire->message) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="message-area"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-loading-text="Saving...">Update</button>
            </div>
        </form>
    </div>
</div>
