@extends('layouts.master')

@section('css')
    <style>
        #ads_filter{
            float: right;
        }
        .modal-dialog{
            max-width: 1200px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css" integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')
    @include('admin.leadstages.modals.create')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ucfirst(preg_replace('/[^a-zA-Z0-9]/s','',Request::segment(1)))}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">{{ucfirst(preg_replace('/[^a-zA-Z0-9]/s','',Request::segment(1)))}}</li>
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
                                <h3 class="card-title">All {{ucfirst(preg_replace('/[^a-zA-Z0-9]/s','',Request::segment(1)))}}</h3>
                            </div>
                            {{--                            <div class="col-sm-5">--}}
                            {{--                                <button type="button" class="backBtn btn btn-dark btn-sm float-right"> <i class="fa fa-arrow-left"></i> Back</button>--}}
                            {{--                            </div>--}}
                            <div class="col-sm-1 col-lg-6">
                                {{--                                    <button class="btn btn-sm float-right btn-primary"><i class="fa fa-plus"></i> Add</button>--}}
                                {{--                                    <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal-default" id="myModal">--}}
                                <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" id="createNewLeadStage">
                                    <i class="fa fa-plus mr-2"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="lead_stages" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th>Id</th>
                                <th>Lead Stage Name</th>
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

@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.flash.js"></script>
    {{--    <script src="/plugins/datatables-buttons/js/buttons.colVis.js"></script>--}}
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


            var table = $('#lead_stages').DataTable({
                processing:true,
                serverSide:true,
                pagingType: 'full_numbers',
                order:[[0, "desc"]],
                dom: 'Bfrtip',
                buttons: [
                    'colvis', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax:"{{ route('leadstages.index') }}",
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

            $('#createNewLeadStage').click(function () {
                // console.log(this.id);
                $("#id").val(null);
                $('.errors').empty();
                $('#createNewLeadStageModalBtn').html("Create");
                $('#create-leadstage-form').trigger("reset");
                $('#createNewLeadStageModalTitle').html("Create New Lead Stage");
                $('#createNewLeadStageModal').modal('show');
                $('#createNewLeadStageModal').on('shown.bs.modal', function () {
                    $('#name').focus();
                });
            });

            $('#create-leadstage-form').submit(function (e) {
                e.preventDefault();
                $('.auto-load').show();
                $('.errors').empty();
                $('#createNewLeadStageModalBtn').html('Save');
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('leadstages.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('.auto-load').hide();
                        if(data.code != 100){
                            $('#createNewLeadStageModal').modal('hide');
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
                        $('#createNewLeadStageModalBtn').html('Save Changes');
                    }
                });
            });

            $(document).delegate('.edit', 'click', function (){
                $('.errors').empty();
                var id = $(this).attr('data-id');
                var url = "{{ route('leadstages.edit', 'id') }}";
                url = url.replace('id', id);
                // alert(url);
                $.get(url, function (data) {
                    console.log(data);
                    $("#id").val(data.data.id);
                    $("#name").val(data.data.name);
                    // console.log($("#id").val());
                    $("#createNewLeadStageModalTitle").html("Edit Lead Stage");
                    $("#createNewLeadStageModalBtn").html("Update");
                    $('#createNewLeadStageModal').modal('show');
                })

            });


        })
    </script>
@endsection
