<!-- Modal -->
<div class="modal fade" id="createTeamModal" tabindex="-1" role="dialog" aria-labelledby="createTeamModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="createTeamModalForm" method="POST" action="{{ route('teams.store') }}" id="create-team-form" enctype="multipart/form-data" style="width: 50%; margin:auto;">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTeamModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __('Team Name') }}</label>
                        <div class="col-md-12">
                            <input id="name" placeholder="Please Enter Team Name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" autocomplete="false"/>
                            <label for="error_name" id="error_name" class="errors" style="color:red"></label>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type">{{ __('Team Type') }}</label>
                        <div class="col-md-12">
                            <select name="type" id="type" class="form-control"
                                    style="width: 100% !important">
                                <option value="">Choose Team Type</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <label for="error_type" id="error_type" class="errors" style="color:red"></label>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target">{{ __('Team Target $') }}</label>
                        <div class="col-md-12">
                            <input id="target" placeholder="Please Enter Team Target in Numbers" type="number" class="form-control @error('target') is-invalid @enderror"
                                   name="target" value="{{ old('target') }}" autocomplete="false"/>
                            <label for="error_target" id="error_target" class="errors" style="color:red"></label>
                            @error('target')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="commission">{{ __('Team Commission %') }}</label>
                        <div class="col-md-12">
                            <input id="commission" placeholder="Please Enter Team Commission in Numbers" type="number" step="0.01" class="form-control @error('commission') is-invalid @enderror"
                                   name="commission" value="{{ old('commission') }}" autocomplete="false"/>
                            <label for="error_commission" id="error_commission" class="errors" style="color:red"></label>
                            @error('commission')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bonus">{{ __('Min. Sales Required For Bonus $') }}</label>
                        <div class="col-md-12">
                            <input id="min_sales" placeholder="Please Enter Min. sales to get bonus in Numbers" type="number" class="form-control @error('min_sales') is-invalid @enderror"
                                   name="min_sales" value="{{ old('min_sales') }}" autocomplete="false"/>
                            <label for="error_min_sales" id="error_min_sales" class="errors" style="color:red"></label>
                            @error('min_sales')
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
                            <button type="submit" class="btn btn-sm btn-primary" id="createTeamModalBtn"></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
