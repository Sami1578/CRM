<!-- Modal -->
<div class="modal fade" id="createNewLeadStageModal" tabindex="-1" role="dialog" aria-labelledby="createNewLeadStageModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="createNewLeadStageModalForm" method="POST" action="<?php echo e(route('leadstages.store')); ?>" id="create-leadstage-form" enctype="multipart/form-data" style="width: 50%; margin:auto;">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewLeadStageModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Lead Stage Name')); ?></label>
                        <div class="col-md-12">
                            <input id="name" placeholder="Please Enter Lead Name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="name" value="<?php echo e(old('name')); ?>" autocomplete="false"/>
                            <label for="error_name" id="error_name" class="errors" style="color:red"></label>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-primary" id="createNewLeadStageModalBtn"></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/admin/leadstages/modals/create.blade.php ENDPATH**/ ?>