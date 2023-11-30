<!-- Modal -->
<div class="modal fade" id="createMemberModal" tabindex="-1" role="dialog" aria-labelledby="createMemberModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form name="createMemberModalForm" method="POST" action="<?php echo e(route('teams.store')); ?>" id="create-member-form" enctype="multipart/form-data" style="width: 50%; margin:auto;">
            <?php echo csrf_field(); ?>
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
                        <label for="team"><?php echo e(__('Add to Team')); ?></label>
                        <div class="col-md-12">
                            <select name="team" id="team" class="form-control"
                                    style="width: 100% !important">
                                <?php if(isset($teams) && $teams->count() != 0): ?>
                                    <option value="">Choose Team Type</option>
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($team->id); ?>"><?php echo e($team->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <option value="">No Teams</option>
                                <?php endif; ?>
                            </select>
                            <label for="error_team" id="error_team" class="errors" style="color:red"></label>
                            <?php $__errorArgs = ['team'];
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
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Name')); ?></label>
                        <div class="col-md-12">
                            <input id="name" placeholder="Please Enter Member Name" type="text" class="form-control <?php $__errorArgs = ['name'];
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
                    <div class="form-group">
                        <label for="email"><?php echo e(__('Email')); ?></label>
                        <div class="col-md-12">
                            <input id="email" placeholder="Please Enter Email Address" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="email" value="<?php echo e(old('email')); ?>" autocomplete="false"/>
                            <label for="error_email" id="error_email" class="errors" style="color:red"></label>
                            <?php $__errorArgs = ['email'];
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
                    <div class="form-group">
                        <label for="target"><?php echo e(__('Individual Target(Monthly)')); ?></label>
                        <div class="col-md-12">
                            <input id="target" placeholder="Please Enter Individual Target in Numbers" type="number" class="form-control <?php $__errorArgs = ['target'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="target" value="<?php echo e(old('target')); ?>" autocomplete="false"/>
                            <label for="error_target" id="error_target" class="errors" style="color:red"></label>
                            <?php $__errorArgs = ['target'];
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
                    <div class="form-group">
                        <label for="commission"><?php echo e(__('Commission Of Sales %')); ?></label>
                        <div class="col-md-12">
                            <input id="commission" placeholder="Please Enter Commission in Numbers" type="number" step="0.01" class="form-control <?php $__errorArgs = ['commission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="commission" value="<?php echo e(old('commission')); ?>" autocomplete="false"/>
                            <label for="error_commission" id="error_commission" class="errors" style="color:red"></label>
                            <?php $__errorArgs = ['commission'];
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
                    <div class="form-group">
                        <label for="min_sales"><?php echo e(__('Minimum Sales to get Bonus')); ?></label>
                        <div class="col-md-12">
                            <input id="min_sales" placeholder="Please Enter Minimum Sales to get Bonus in Numbers" type="number" class="form-control <?php $__errorArgs = ['min_sales'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="min_sales" value="<?php echo e(old('min_sales')); ?>" autocomplete="false"/>
                            <label for="error_min_sales" id="error_min_sales" class="errors" style="color:red"></label>
                            <?php $__errorArgs = ['min_sales'];
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
                    <div class="form-group">
                        <label for="bonus"><?php echo e(__('Bonus on Acheiving Target %')); ?></label>
                        <div class="col-md-12">
                            <input id="bonus" placeholder="Please Enter Bonus on Acheiving Target in Numbers" type="number" step="0.01" class="form-control <?php $__errorArgs = ['bonus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="bonus" value="<?php echo e(old('bonus')); ?>" autocomplete="false"/>
                            <label for="error_bonus" id="error_bonus" class="errors" style="color:red"></label>
                            <?php $__errorArgs = ['bonus'];
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
                            <button type="submit" class="btn btn-sm btn-primary" id="createMemberModalBtn"></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH E:\Sami new\Laravel Projects\cnbcrm.org\cnbcrm.org\resources\views/admin/members/modals/create.blade.php ENDPATH**/ ?>