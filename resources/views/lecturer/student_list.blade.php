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
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>Class</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@stop


        




            