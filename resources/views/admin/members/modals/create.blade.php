<!-- Modal -->
<div class="modal fade" id="createMemberModal" tabindex="-1" role="dialog" aria-labelledby="createMemberModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="createMemberModalForm" method="POST" action="{{ route('teams.store') }}" id="create-member-form" enctype="multipart/form-data" style="width: 50%; margin:auto;">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createMemberModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="user_id" id="user_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="team">{{ __('Add to Team') }}</label>
                        <div class="col-md-12">
                            <select name="team" id="team" class="form-control"
                                    style="width: 100% !important">
                                @if(isset($teams) && $teams->count() != 0)
                                    <option value="">Choose Team Type</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                @else
                                    <option value="">No Teams</option>
                                @endif
                            </select>
                            <label for="error_team" id="error_team" class="errors" style="color:red"></label>
                            @error('team')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <div class="col-md-12">
                            <input id="name" placeholder="Please Enter Member Name" type="text" class="form-control @error('name') is-invalid @enderror"
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
                        <label for="email">{{ __('Email') }}</label>
                        <div class="col-md-12">
                            <input id="email" placeholder="Please Enter Email Address" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" autocomplete="false"/>
                            <label for="error_email" id="error_email" class="errors" style="color:red"></label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="target">{{ __('Individual Target(Monthly)') }}</label>
                        <div class="col-md-12">
                            <input id="target" placeholder="Please Enter Individual Target in Numbers" type="number" class="form-control @error('target') is-invalid @enderror"
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
                        <label for="commission">{{ __('Commission Of Sales %') }}</label>
                        <div class="col-md-12">
                            <input id="commission" placeholder="Please Enter Commission in Numbers" type="number" step="0.01" class="form-control @error('commission') is-invalid @enderror"
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
                        <label for="min_sales">{{ __('Minimum Sales to get Bonus') }}</label>
                        <div class="col-md-12">
                            <input id="min_sales" placeholder="Please Enter Minimum Sales to get Bonus in Numbers" type="number" class="form-control @error('min_sales') is-invalid @enderror"
                                   name="min_sales" value="{{ old('min_sales') }}" autocomplete="false"/>
                            <label for="error_min_sales" id="error_min_sales" class="errors" style="color:red"></label>
                            @error('min_sales')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bonus">{{ __('Bonus on Acheiving Target %') }}</label>
                        <div class="col-md-12">
                            <input id="bonus" placeholder="Please Enter Bonus on Acheiving Target in Numbers" type="number" step="0.01" class="form-control @error('bonus') is-invalid @enderror"
                                   name="bonus" value="{{ old('bonus') }}" autocomplete="false"/>
                            <label for="error_bonus" id="error_bonus" class="errors" style="color:red"></label>
                            @error('bonus')
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
                            <button type="submit" class="btn btn-sm btn-primary" id="createMemberModalBtn"></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
