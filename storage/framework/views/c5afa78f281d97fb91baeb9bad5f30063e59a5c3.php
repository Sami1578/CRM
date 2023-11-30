<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM</title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/../dist/css/adminlte.min.css">
    <style>
        .auto-load {
            background: #00000063;
            position: absolute;
            width: 100%;
            top: 0%;
            bottom: 0%;
            display: none;
            z-index: 3544;
        }

        .auto-load svg {
            top: 40%;
            position: fixed;
            border-radius: 8px;
            right: 45%;
        }

        .auto-load svg + p {
            display: block;
            position: absolute;
            top: 59%;
            text-align: center;
            width: 20%;
            color: white;
            font-weight: bolder;
            margin: 0px 50%;
            border-radius: 9px;
        }
    </style>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
<?php echo $__env->make('layouts.sections.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sections.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sections.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?php echo $__env->make('layouts.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/../dist/js/adminlte.min.js"></script>


<?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/layouts/master.blade.php ENDPATH**/ ?>