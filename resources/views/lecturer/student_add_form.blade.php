@extends('lecturer.layout.app')

@section('title', 'Student List')

@section('content')

            
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">@yield('title')</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @elseif(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            <form method="post" action="{{$config->homeUrl}}/student/add" onclick="return addStudent(this);">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label for="name">Student Name</label>
                                    <input class="form-control" type="text" name="name" id="" placeholder="Enter student name" required />
                                </div>
                                <div class="form-group">
                                    <label for="student_id">Student ID</label>
                                    <input class="form-control" type="text" name="id" id="" placeholder="Enter student ID" required />
                                </div>
                                <div class="form-group">
                                    <label for="student_email">Student Email</label>
                                    <input class="form-control" type="email" name="email" id="" placeholder="Enter student E-mail" required />
                                </div>
                                <div class="form-group">
                                    <label for="student_phone">Student Phone No</label>
                                    <input class="form-control" type="number" name="phone" id="" placeholder="Enter student phone no." required />
                                </div>
                                <div class="form-group">
                                    <label for="student_password">New Password</label>
                                    <input class="form-control" type="password" name="new_password" id="" placeholder="Enter new password" required />
                                </div>
                                <div class="form-group">
                                    <label for="student_retype_password">Retype New Password</label>
                                    <input class="form-control" type="password" name="retype_new_password" id="" placeholder="Retype new password again" required />
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add Student" class="btn btn-primary form-control">
                                </div>
                            </form>
                        </div>
                    </div>
@stop
