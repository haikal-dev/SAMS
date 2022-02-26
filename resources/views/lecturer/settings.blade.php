@extends('lecturer.layout.app')

@section('title', 'Settings')

@section('content')

            
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">@yield('title')</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Settings
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="list-group">
                                        <a href="{{env('APP_URL')}}/settings/change-password" class="list-group-item">Change Password</a>
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                    </div>

@stop

            