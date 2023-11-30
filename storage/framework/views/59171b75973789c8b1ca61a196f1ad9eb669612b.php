<!-- Modal -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="changeStatusModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="changeStatusForm" method="post" action="" id="change-status-form" style="width: 50%; margin:auto;">
            <?php echo method_field('put'); ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" id="lead_id" value="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeStatusModalTitle">Change Lead Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status"><?php echo e(__('Status')); ?></label>
                        <select name="status" id="lead_status" class="form-control"
                                style="width: 100% !important">
                            <option value="" label="Select Lead Status" selected="selected">Select Lead Status</option>
                            <?php $__currentLoopData = $leadstatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($leadstatus->id); ?>"><?php echo e($leadstatus->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="error_subscription_status" id="error_ad_status" class="errors" style="color:red"></label>
                    </div>
                    <div class="form-group">
                        <label class="infoTitle"><?php echo e(__('Select Lead Stage')); ?></label>
                        <select name="lead_stage" id="lead_stage" class="form-control niceSelect"
                                style="width: 100% !important">
                            <option value="" label="Select Lead Stage" selected="selected">Select Lead Stage</option>
                            <?php $__currentLoopData = $leadstages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leadstage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($leadstage->id); ?>"><?php echo e($leadstage->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="error_lead_stage" id="error_lead_stage" class="errors" style="color:red"></label>
                    </div>
                    <div class="form-group">
                        <label class="infoTitle">Call Back Time</label>
                        <div class="input-form">
                            
                            <input type="datetime-local" class="form-control" id="call_back_time_for_status" name="call_back_time" value="<?php echo e(old('call_back_time')); ?>">
                            <div class="icon"><i class="las la-dollar-sign"></i></div>
                        </div>
                        <label for="error_call_back_time" id="error_call_back_time" class="errors" style="color:red"></label>
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
<?php /**PATH E:\Sami new\Laravel Projects\cnbcrm.org\cnbcrm.org\resources\views/admin/leads/modals/changestatus.blade.php ENDPATH**/ ?>