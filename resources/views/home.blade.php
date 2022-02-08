<!DOCTYPE html>
<html lang="en">
<head>
  <title>SAMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{env('APP_URL')}}">SAMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{env('APP_URL')}}">Home</a></li>
      </ul>
      
    </div>
  </div>
</nav>
  
<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-6" align="center" style="margin-bottom: 20px;">
            <a class="btn btn-info" href="{{env('APP_URL')}}/lecturer">
                <img src="{{env('APP_URL')}}/assets/training.png" />
                <h3>Lecturer</h3>
            </a>
        </div>
        <div class="col-md-6" align="center">
        <a class="btn btn-warning" href="{{env('APP_URL')}}/student">    
            <img src="{{env('APP_URL')}}/assets/student-male.png" />
            <h3>Student</h3>
        </a>
        </div>
    </div>
</div>

</body>
</html>
