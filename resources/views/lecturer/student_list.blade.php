@extends('lecturer.layout.app')

@section('title', 'Student List')

@section('content')

            
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">@yield('title')</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-12">
                            <a href="{{$config->homeUrl}}/student/add" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Student</a>
                        </div>
                        <div class="col-lg-12" style="margin-top: 10px;">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $counter }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td><a class="btn btn-primary" href="{{ $config->homeUrl }}/student/view/{{ $student->id }}" title="View Student Details"><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@stop


        




            