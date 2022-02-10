
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SAMS for Developer - Login</title>

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
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="pass" type="password" required />
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
            @if($statusLoggedOut)

            $('#message').removeClass();
            $('#message').html('Successfully logged out!');
            $('#message').addClass('alert alert-success');
            $('#message').slideDown();
            setTimeout(function(){
                $('#message').slideUp();
            }, 2000);
            
            @endif

            function logIn(f){
                $('#message').removeClass();
                $('#message').html('Logging In...');
                $('#message').addClass('alert alert-info');
                $('#message').slideDown();
                $('#form').slideUp();

                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '{{env("APP_URL")}}/dev',
                    data: {
                        email: f.email.value,
                        pass: f.pass.value,
                        _token: f._token.value
                    },
                    success: function(data){
                        if(data.message != 'OK'){
                            f.reset();
                            $('#message').html(data.message);
                            $('#message').removeClass();
                            $('#message').addClass('alert alert-danger');
                            $('#form').slideDown();
                        } else {
                            $('#message').html('Logged In!');
                            $('#message').removeClass();
                            $('#message').addClass('alert alert-success');
                            window.location = "{{env('APP_URL')}}/dev";
                        }
                    }
                });

                return false;
            }
        </script>

    </body>
</html>
