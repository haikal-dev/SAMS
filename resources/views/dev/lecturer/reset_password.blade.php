@extends('dev.layout.app')

@section('title', 'Lecturer')

@section('content')

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Reset Password</h1>
                        </div>
                        
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-4">
                            <div style="margin-top: 10px;">
                                <form method="post" action="/dev/lecturer/reset-password/{{$data->id}}" onsubmit="return resetPassword(this);">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="" class="form-control" value="{{$data->fullname}}" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" name="email" id="" class="form-control" value="{{$data->email}}" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Enter new password" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Retype New Password</label>
                                        <input class="form-control" type="password" name="repassword" placeholder="Retype password again" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Reset Password" name="btn" class="form-control btn btn-primary">
                                    </div>
                                </form>
                            </div>
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

function resetPassword(form){
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