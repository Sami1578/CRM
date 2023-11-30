<!-- Modal -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="changeStatusModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="changeStatusForm" method="post" action="" id="change-status-form" style="width: 50%; margin:auto;">
            @method('put')
            @csrf
            <input type="hidden" name="id" id="service_id" value="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeStatusModalTitle">Change Subscription Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <div class="col-md-12">
                            <select name="status" id="service_status" class="form-control"
                                    style="width: 100% !important">
                                <option value="active" >Active</option>
                                <option value="inactive" >Inactive</option>
                                <option value="pending" >Pending</option>
                            </select>
                        </div>
                        <label for="error_subscription_status" id="error_ad_status" class="errors" style="color:red"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary" id="changeStatusModalBtn">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
