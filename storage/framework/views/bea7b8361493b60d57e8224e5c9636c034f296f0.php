<?php $__env->startSection('content'); ?>
    <!--  .row 1-->
    <div class="content py-5">
        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
        <section class="content">
            <div class="container-fluid">
                <h1>Teams</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($totalTeamsCount); ?></h3>
                                <p>Total Teams Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="<?php echo e(route('teams.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo e($lastMonthTeamsCount); ?></h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="<?php echo e(route('teams.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e($lastMonthTeamsPer.'%'); ?></h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="<?php echo e(route('teams.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->

                <h1>Members</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($totalMembersCount); ?></h3>
                                <p>Total Members Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="<?php echo e(route('members.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo e($lastMonthMembersCount); ?></h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="<?php echo e(route('members.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e($lastMonthMembersPer.'%'); ?></h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="<?php echo e(route('members.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <h1>Leads</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($totalLeadsCount); ?></h3>
                                <p>Total Leads Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                            <a href="<?php echo e(route('leads.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo e($lastMonthLeadsCount); ?></h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                            <a href="<?php echo e(route('leads.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e($lastMonthLeadsPer.'%'); ?></h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="<?php echo e(route('leads.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- small card -->
                </div>

                <h1>Sales</h1>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($totalSalesCount); ?> $</h3>
                                <p>Total Sales Count</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo e($lastMonthSalesCount); ?> $</h3>
                                <p>Last Month</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e($lastMonthSalesPer.'%'); ?></h3>
                                <p>Net Change</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- small card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?php endif; ?>

        <?php if(auth()->check() && auth()->user()->hasRole('member')): ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>REP <?php echo e(auth()->user()->id); ?></h3>

                                    <p>REP ID</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo e(auth()->user()->member->team->name); ?></h3>

                                    <p>TEAM NAME</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo e($remainingTeamTarget); ?> </h3>

                                    <p>TEAM TARGET</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo e($remainingIndividualTarget); ?></h3>

                                    <p>INDIVIDUAL TARGET</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>

                            </div>
                        </div>
                    </div>

















                    <h1>My Leads</h1>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo e($totalLeadsCount); ?></h3>
                                    <p>Total Leads Count</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo e($lastMonthLeadsCount); ?></h3>
                                    <p>Last Month</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo e($lastMonthLeadsPer.'%'); ?></h3>
                                    <p>Net Change</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- small card -->
                    </div>

                    <h1>My Sales</h1>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo e($totalIndividualSalesCount); ?> $</h3>
                                    <p>Total Sales Count</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo e($lastMonthIndividualSalesCount); ?> $</h3>
                                    <p>Last Month</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo e($lastMonthIndividualSalesPer.'%'); ?></h3>
                                    <p>Net Change</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <a href="<?php echo e(route('myleads.index')); ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- small card -->
                    </div>

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/dashboard.blade.php ENDPATH**/ ?>