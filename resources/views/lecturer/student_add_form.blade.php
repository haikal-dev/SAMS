@extends('lecturer.layout.app')

@section('title', 'Student Registration')

@section('content')

            
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">@yield('title')</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-user fa-fw"></i> Student Registration Form
                                    </div>
                                    <div class="panel-body">
                                        @if(Session::has('error'))
                                        <div class="alert alert-danger">ERROR: {{Session::get('error')}}</div>
                                        @elseif(Session::has('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                        @endif
                                        <form method="post" action="{{$config->homeUrl}}/student/add" onsubmit="return addStudent(this);">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                            <div class="form-group">
                                                <label for="name">Student Name</label>
                                                <input class="form-control" type="text" name="name" placeholder="Enter student name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="student_id">Student ID</label>
                                                <input class="form-control" type="text" name="id" placeholder="Enter student ID" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="student_email">Student Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Enter student E-mail" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="student_phone">Student Phone No</label>
                                                <input class="form-control" type="number" name="phone" placeholder="Enter student phone no." required />
                                            </div>
                                            <div class="form-group">
                                                <label for="student_password">New Password</label>
                                                <input class="form-control" type="password" name="new_password" placeholder="Enter new password" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="student_retype_password">Retype New Password</label>
                                                <input class="form-control" type="password" name="retype_new_password" placeholder="Retype new password again" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Add Student" name="btn" class="btn btn-primary form-control">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@stop

@section('js')

<script>

function addStudent(form){
    if(form.new_password.value != form.retype_new_password.value){
        alert("Password does not match with retype password!");
    }

    else {
        form.btn.disabled = true;
        form.submit();
    }

    return false;
}

</script>

@stop
