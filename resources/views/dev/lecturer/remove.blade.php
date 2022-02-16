@extends('dev.layout.app')

@section('title', 'Lecturer')

@section('content')

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">@yield('title')</h1>
                        </div>
                        
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-12">
                            <h4>Are you sure want to remove this account?</h4>
                            &mdash; {{$data->fullname}} <small>({{$data->email}})</small>
                            
                            <div style="margin-top: 10px;">
                                <form method="post" action="/dev/lecturer/remove/{{$data->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input type="submit" class="btn btn-danger" value="Remove Now" />
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