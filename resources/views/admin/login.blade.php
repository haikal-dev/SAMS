
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SAMS for Administrator - Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{env('APP_URL')}}/assets/startmin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{env('APP_URL')}}/assets/startmin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{env('APP_URL')}}/assets/startmin/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{env('APP_URL')}}/assets/startmin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <div id="message" style="display:none;" align="center"></div>
                            <form id="form" role="form" onsubmit="return logIn(this);">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" value="Login" class="btn btn-success btn-block" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{env('APP_URL')}}/assets/startmin/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{env('APP_URL')}}/assets/startmin/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{env('APP_URL')}}/assets/startmin/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{env('APP_URL')}}/assets/startmin/js/startmin.js"></script>

        <script>
            function logIn(f){
                $('#message').removeClass();
                $('#message').html('Logging In...');
                $('#message').addClass('alert alert-info');
                $('#message').slideDown();
                $('#form').slideUp();

                // api for login process
                // currently only show timer
                // if success
                // setTimeout(function(){
                //     $('#message').html('Logged In!');
                //     $('#message').removeClass();
                //     $('#message').addClass('alert alert-success');
                // }, 3000);

                // if fail
                // setTimeout(function(){
                //     $('#message').html('Invalid authentication!');
                //     $('#message').removeClass();
                //     $('#message').addClass('alert alert-danger');
                //     $('#form').slideDown();
                // }, 3000);

                return false;
            }
        </script>

    </body>
</html>
