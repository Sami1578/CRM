<!-- Modal -->
<div class="modal fade" id="createLeadStatusModal" tabindex="-1" role="dialog" aria-labelledby="createLeadStatusModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="createLeadStatusModalForm" method="POST" action="{{ route('leadstatus.store') }}" id="create-leadstatus-form" enctype="multipart/form-data" style="width: 50%; margin:auto;">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLeadStatusModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <div class="col-md-12">
                            <input id="name" placeholder="Please Enter Status Name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" autocomplete="false"/>
                            <label for="error_name" id="error_name" class="errors" style="color:red"></label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary" id="createLeadStatusModalBtn"></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
