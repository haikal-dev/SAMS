@extends('dev.layout.app')

@section('title', 'Lecturer')

@section('content')

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Lecturer Detail</div>
                                <div class="panel-body">
                                    <b>Name:</b> <br />
                                    {{ strtoupper($data->fullname) }} <br /><br/>

                                    <b>Staff ID:</b> <br />
                                    {{ $data->staff_id }} <br /><br/>

                                    <b>E-mail:</b> <br />
                                    {{ $data->email }} <br /><br/>

                                    <b>Phone No:</b> <br />
                                    {{ $data->phone }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirmation</h5>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure want to log out?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger" onclick="window.location='/dev/logout';">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

@stop

@section('js')

<!-- Custom JS -->
<script>

function newLecturer(form){
    form.btn.disabled = true;

    if(form.password.value != form.repassword.value){
        alert("You have entered unmatched password! Please re-check your password field again.");
        form.btn.disabled = false;
    }

    else {
        form.submit();
    }

    return false;
}

</script>

@stop