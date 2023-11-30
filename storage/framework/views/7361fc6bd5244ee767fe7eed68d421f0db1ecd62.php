<?php $__env->startSection('css'); ?>
    <style>
        #ads_filter{
            float: right;
        }
        .modal-dialog{
            max-width: 1200px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css" integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.leadstatus.modals.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo e(ucfirst(preg_replace('/[^a-zA-Z0-9]/s','',Request::segment(1)))); ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e(ucfirst(preg_replace('/[^a-zA-Z0-9]/s','',Request::segment(1)))); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-sm-12">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 text-justify" style="display: flex; align-items: center;">
                                <h3 class="card-title">All <?php echo e(ucfirst(preg_replace('/[^a-zA-Z0-9]/s','',Request::segment(1)))); ?></h3>
                            </div>
                            
                            
                            
                            <div class="col-sm-1 col-lg-6">
                                
                                
                                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" id="createNewLeadStatus">
                                    <i class="fa fa-plus mr-2"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="leadstatus" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th>Id</th>
                                <th>Status Name</th>
                                <th>Created By</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.flash.js"></script>

    <script src="/plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function sweetAlertToster(code = null, message = null, name = null, image = null, icon = null) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                if (code == 200) {
                    Toast.fire({
                        icon: 'success',
                        title: message
                    });
                } else if (name) {
                    Toast.fire({
                        icon: 'error',
                        title: name
                    });
                } else if (image) {
                    Toast.fire({
                        icon: 'error',
                        title: image
                    });
                } else if (icon) {
                    Toast.fire({
                        icon: 'error',
                        title: icon
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: message
                    });
                }
            }


            var table = $('#leadstatus').DataTable({
                processing:true,
                serverSide:true,
                pagingType: 'full_numbers',
                order:[[0, "desc"]],
                dom: 'Bfrtip',
                buttons: [
                    'colvis', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax:"<?php echo e(route('leadstatus.index')); ?>",
                columns:[
                    {data: 'created_at'},
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'created_by'},
                    {data: 'options'},
                ]
            });

            table.buttons().container()
                .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

            $('#createNewLeadStatus').click(function () {
                // console.log(this.id);
                $("#id").val(null);
                $('.errors').empty();
                $('#createLeadStatusModalBtn').html("Create");
                $('#create-leadstatus-form').trigger("reset");
                $('#createLeadStatusModalTitle').html("Create New Lead Status");
                $('#createLeadStatusModal').modal('show');
                $('#createLeadStatusModal').on('shown.bs.modal', function () {
                    $('#name').focus();
                });
            });

            $('#create-leadstatus-form').submit(function (e) {
                e.preventDefault();
                $('.auto-load').show();
                $('#createLeadStatusModalBtn').html("Creating...");
                $('#createLeadStatusModalBtn').prop("disabled", true);
                $('.errors').empty();
                $.ajax({
                    data: $(this).serialize(),
                    url: "<?php echo e(route('leadstatus.store')); ?>",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('.auto-load').hide();
                        if(data.code != 100){
                            $('#createLeadStatusModalBtn').prop("disabled", false);
                            $('#createLeadStatusModal').modal('hide');
                            $(this).trigger("reset");
                            sweetAlertToster(data.code, data.message, data.name);
                            table.draw();
                        }else{

                            if(data.error){
                                if (data.error.name) {
                                    $('#error_name').html(data.error.name);
                                }
                            }else{
                                sweetAlertToster(data.code, data.message, data.name);
                            }

                        }

                    },
                    error: function (data) {
                        $('#createLeadStatusModalBtn').html('Save Changes');
                    }
                });
            });

            // $.ajaxSetup({
            //     headers: {
            //         "X-CSRFToken": getCookie("csrftoken")
            //     }
            // });


            $(document).delegate('.delete', 'click', function (){
                var id = $(this).attr('data-id');
                
                
                var result = confirm("Are You sure want to delete!");
                if(result){
                    $.ajax({
                        type: "DELETE",
                        url: "<?php echo e(route('leadstatus.store')); ?>"+'/'+id,
                        success: function (data) {
                            table.draw();
                            sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null,data.icon);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }

            });

            $(document).delegate('.edit', 'click', function (){
                $('.errors').empty();
                var id = $(this).attr('data-id');
                var url = "<?php echo e(route('leadstatus.edit', 'id')); ?>";
                url = url.replace('id', id);
                // alert(url);
                $.get(url, function (data) {
                    // console.log(data);
                    $("#id").val(data.data.id);
                    $("#name").val(data.data.name);
                    // console.log($("#id").val());
                    $("#createLeadStatusModalTitle").html("Edit Lead Status");
                    $("#createLeadStatusModalBtn").html("Update");
                    $('#createLeadStatusModal').modal('show');
                })

            });



        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/admin/leadstatus/index.blade.php ENDPATH**/ ?>