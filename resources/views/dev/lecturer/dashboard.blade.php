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
                    <div class="row">
                        <div class="col-md-12">
                            <a data-toggle="modal" data-target="#addLecturer" href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Lecturer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!-- Modal -->
                            <div class="modal fade" id="addLecturer" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form onclick="return newLecturer(this);">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">New Lecturer</h5>
                                            </div>
                                            <div class="modal-body">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="form-group">
                                                        <input type="text" name="name" id="" placeholder="Enter New Lecturer" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="staffId" id="" placeholder="Enter Staff ID" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="staffId" id="" placeholder="Enter Staff ID" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-danger" value="Add New Lecturer" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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