

<?php $__env->startSection('css'); ?>
    <style>

        .md-country-picker-item {
            position: relative;
            line-height: 20px;
            padding: 10px 0 10px 40px;
        }

        .md-country-picker-flag {
            position: absolute;
            left: 0;
            height: 20px;
        }

        .mbsc-scroller-wheel-item-2d .md-country-picker-item {
            transform: scale(1.1);
        }
        #ads_filter{
            float: right;
        }
        .modal-dialog{
            max-width: 1200px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css" integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('member.leads.modals.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('member.leads.modals.changestatus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('member.leads.modals.send-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                
                                
                                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" id="createNewLead">
                                    <i class="fa fa-plus mr-2"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="leads" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th>Lead Id</th>
                                <th>Lead Name</th>
                                <th>Business Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Zip Code</th>
                                <th>Street</th>
                                <th>Address</th>
                                <th>Revenue</th>
                                <th>Lead Stage</th>
                                <th>Status</th>
                                <th>Callback Time</th>
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

    
    <script src="/plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script>
        $(document).ready(function(){
            // $('.auto-load').show();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const phoneInputField = document.querySelector("#phone");
            const phoneInput = window.intlTelInput(phoneInputField, {
                utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });

            // const info = document.querySelector("#error_phone");
            //
            // function process(event) {
            //     event.preventDefault();
            //
            //     const phoneNumber = phoneInput.getNumber();
            //
            //     info.style.display = "";
            //     info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
            // }


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

            var table = $('#leads').DataTable({
                processing:true,
                serverSide:true,
                order:[[0, "desc"]],
                buttons: [
                    'colvis', 'csv', 'excel', 'pdf', 'print'
                ],
                dom: 'Bfrtip',
                ajax:"<?php echo e(route('myleads.index')); ?>",
                columns:[
                    {data: 'created_at'},
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'bussiness'},
                    {data: 'phone'},
                    {data: 'email'},
                    {data: 'country'},
                    {data: 'state'},
                    {data: 'city'},
                    {data: 'zipcode'},
                    {data: 'street'},
                    {data: 'address'},
                    {data: 'revenue'},
                    {data: 'lead_stage'},
                    {data: 'status'},
                    {data: 'call_back_time'},
                    {data: 'options'},
                ]
            });
            $('#country_id').on('change', function(){
                let $country = $(this).val();
                let url = '/getstates/' + $country;
                let select_id = '#state_id';
                loadData(url, select_id);
            })

            $('#state_id').on('change', function(){
                let $state = $(this).val();
                let url = '/getcities/' + $state;
                let select_id = '#city_id';
                loadData(url, select_id);
            })

            function loadData(url, select_id, value = null){
                $(select_id).empty();
                var $request =$.ajax({
                    url : url
                });

                $request.then(function(data) {
                    if(data != null){
                        $(select_id).append(data.data);
                        // $(select_id).niceSelect('update');
                        if(value != null){
                            // console.log(value);
                            $(select_id).val(value);
                        }
                    }
                })
            }

            $('#createNewLead').click(function () {
                // console.log(this);
                $('#create-lead-form').trigger('reset');
                $("#id").val(null);
                $("#user_id").val(null);
                $('.errors').empty();
                $('#createLeadModalBtn').html("Create");
                $('#create-member-form').trigger("reset");
                $('#createLeadModalTitle').html("Create New Lead");
                $('#createLeadModal').modal('show');
                $('#createLeadModal').on('shown.bs.modal', function () {
                    $('#name').focus();
                });
            });

            $('#create-lead-form').submit(function (e) {
                $('.auto-load').show();
                e.preventDefault();
                $('.errors').empty();
                $('#createLeadModalBtn').html('Save');
                $.ajax({
                    data: $(this).serialize(),
                    url: "<?php echo e(route('myleads.store')); ?>",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('.auto-load').hide();
                        if(data.code != 100){
                            $('#createLeadModal').modal('hide');
                            $(this).trigger("reset");
                            sweetAlertToster(data.code, data.message, data.name);
                            table.draw();
                        }else{
                            if(data.error){
                                if (data.error.first_name) {
                                    $('#error_first_name').html(data.error.first_name);
                                }
                                if (data.error.last_name) {
                                    $('#error_last_name').html(data.error.last_name);
                                }
                                if (data.error.business_name) {
                                    $('#error_business_name').html(data.error.business_name);
                                }
                                if (data.error.call_back_time) {
                                    $('#error_call_back_time').html(data.error.call_back_time);
                                }
                                if (data.error.service) {
                                    $('#error_service').html(data.error.service);
                                }
                                if (data.error.lead_stage) {
                                    $('#error_lead_stage').html(data.error.lead_stage);
                                }
                                if (data.error.revenue) {
                                    $('#error_revenue').html(data.error.revenue);
                                }
                                if (data.error.message) {
                                    $('#error_message').html(data.error.message);
                                }
                                if (data.error.country) {
                                    $('#error_country').html(data.error.country);
                                }
                                if (data.error.state) {
                                    $('#error_state').html(data.error.state);
                                }
                                if (data.error.city) {
                                    $('#error_city').html(data.error.city);
                                }
                                if (data.error.zipcode) {
                                    $('#error_zipcode').html(data.error.zipcode);
                                }
                                if (data.error.street) {
                                    $('#error_street').html(data.error.street);
                                }
                                if (data.error.address) {
                                    $('#error_address').html(data.error.address);
                                }
                                if (data.error.phone) {
                                    $('#error_phone').html(data.error.phone);
                                }
                                if (data.error.email) {
                                    $('#error_email').html(data.error.email);
                                }
                            }else{
                                sweetAlertToster(data.code, data.message, data.name);
                            }

                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#createLeadModalBtn').html('Save Changes');
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
                    $('.auto-load').show();
                    $.ajax({
                        type: "DELETE",
                        url: "<?php echo e(route('myleads.store')); ?>"+'/'+id,
                        success: function (data) {
                            $('.auto-load').hide();
                            table.draw();
                            sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null,data.icon);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }

            });
            let countrySelect = $('#country_id');
            countrySelect.on('change', function(){
                // console.log(this.value);
                phoneInput.setCountry(this.value);
            })

            $(document).delegate('.edit', 'click', function (){
                $('.auto-load').show();
                $('.errors').empty();
                var id = $(this).attr('data-id');
                var url = "<?php echo e(route('myleads.edit', 'id')); ?>";
                url = url.replace('id', id);
                // alert(url);
                $.get(url, function (data) {
                    // console.log(data);
                    $('.auto-load').hide();
                    $("#id").val(data.data.id);
                    $("#first_name").val(data.data.first_name);
                    $("#last_name").val(data.data.last_name);
                    $("#business_name").val(data.data.business_name);
                    $("#revenue").val(data.data.revenue);
                    $("#call_back_time").val(data.data.call_back_time);
                    $("#service_id").val(data.data.service_id);
                    $("#country_id").val(data.country.iso2);
                    let states_url = '/getstates/' + data.country.iso2;
                    loadData(states_url, '#state_id',data.data.state_id);
                    // $("#state_id").val(data.data.state_id);
                    let city_url = '/getcities/' + data.data.state_id;
                    loadData(city_url, '#city_id', data.data.city_id);
                    // $("#city_id").val(data.data.city_id);
                    $("#street").val(data.data.street);
                    $("#zipcode").val(data.data.zipcode);
                    $("#address").val(data.data.address);
                    $("#lead_status_create").val(data.data.lead_status_id);
                    $("#lead_stage_create").val(data.data.lead_stage_id);
                    $("#phone").val(data.data.phone);
                    $("#email").val(data.data.email);
                    // console.log($("#id").val());
                    $("#createLeadModalTitle").html("Edit Lead");
                    $("#createLeadModalBtn").html("Update");
                    $('#createLeadModal').modal('show');
                    phoneInput.setCountry(data.country.iso2);

                })

            });
            $(document).delegate('.changeStatus', 'click', function (e){
                $('.auto-load').show();
                e.preventDefault();
                let id = $(this).attr('data-id');
                let url = "<?php echo e(route('myleads.change.status', 'id')); ?>";
                url = url.replace('id', id);
                $('#change-status-form').trigger("reset");
                $.get(url, function(data){
                    $('.auto-load').hide();
                    // console.log(data.data.lead_status_id);
                    if(data.code != 100){
                        $('#lead_status').val(data.data.lead_status_id);
                        $('#lead_stage').val(data.data.lead_stage_id);
                        $('#call_back_time_for_status').val(data.data.call_back_time);
                        $('#lead_id').val(id);
                        $('#changeStatusModal').modal('show');
                    }else{
                        sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null, data.icon);}
                });

            });

            $('#change-status-form').submit(function (e){
                $('.auto-load').show();
                e.preventDefault();
                var formData = new FormData(this);
                let url = $(this).attr('action');
                // console.log(url);
                $.ajax({
                    data : formData,
                    url: "<?php echo e(route('myleads.update.status')); ?>",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function (data){
                        // console.log(data);
                        if(data.code != 100){
                            $('.auto-load').hide();
                            $(this).trigger("reset");
                            table.draw();
                            $('#changeStatusModal').modal('hide');
                            $('#change-status-form').trigger("reset");
                            sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null, data.icon);
                        }else{
                            sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null, data.icon);
                        }
                    },
                })
            })

            $(document).delegate('.message', 'click', function (e){
                e.preventDefault();
                $('.messages').empty();
                let id = $(this).attr('data-id');
                $('#lead_id_for_message').val(id);
                let url = "<?php echo e(route('myleadmessages.edit', 'id')); ?>";
                url = url.replace('id', id);
                // console.log(url);
                $.get(url, function(data){
                    if(data.code != 100){
                        $('.messages').append(data.data);
                        $('#sendMessageModal').modal('show');
                    }else{
                        sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null, data.icon);}
                });

            });

            $('#send-message-form').submit(function (e){
                $('.auto-load').show();
                e.preventDefault();
                $('#sendMessageModalBtn').text('Sending');
                $('#sendMessageModalBtn').prop('disabled', true);
                var formData = new FormData(this);
                let url = $(this).attr('action');

                // console.log(url);
                $.ajax({
                    data : formData,
                    url: "<?php echo e(route('myleadmessages.store')); ?>",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function (data){
                        $('.auto-load').hide();
                        console.log(data);
                        if(data.code != 100){
                            // table.draw();
                            // $('#changeStatusModal').modal('hide');
                            $('#sendMessageModalBtn').prop('disabled', false);
                            $('#sendMessageModalBtn').text('Send');
                            $('.messages').empty();
                            let id = data.lead_id;
                            let reload_url = "<?php echo e(route('myleadmessages.edit', 'id')); ?>";
                            reload_url = reload_url.replace('id', id);
                            $.get(reload_url, function(data){
                                if(data.code != 100){
                                    $('.messages').append(data.data);
                                    $('.messages').scrollTop($('.messages').prop("scrollHeight"));
                                    // $('.auto-load').hide();
                                }else{
                                    sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null, data.icon);}
                            });
                            // $(".messages").load( location.href + " .messages>*", "");
                            $('#send-message-form').trigger("reset");
                            sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null, data.icon);
                        }else{
                            sweetAlertToster(data.code, data.message, data.name ? data.name : null, data.image ? data.image : null, data.icon);
                        }
                    },
                })
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sellhwja/cnbcrm.org/resources/views/member/leads/index.blade.php ENDPATH**/ ?>