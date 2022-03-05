@extends('lecturer.layout.app')

@section('title', 'Student List')

@section('content')

            
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">@yield('title')</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            <form method="post" action="{{$config->homeUrl}}/student/add">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label for="name">Student Name</label>
                                    <input class="form-control" type="text" name="student_name" id="" placeholder="Enter student name" required />
                                </div>
                                
                            </form>
                        </div>
                    </div>
@stop


        




            