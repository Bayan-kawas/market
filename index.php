<?php

require 'connection.PHP';

 if(isset($_POST['signIn']))
{

$uname = $_POST['username'];
$pass= $_POST['password']; 
$query="SELECT `id` FROM `log_in` WHERE user_name="."'".$uname."'"." AND password ="."'".$pass."'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result)==1)
{
$query2="SELECT `auth` FROM `log_in` WHERE user_name="."'".$uname."'"." AND password ="."'".$pass."'";
$result2 = mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)>0)
{
while($row=mysqli_fetch_assoc($result2))	
{
if ($row["auth"]==1)
		{header('location:manager.php');} 
        else{header('location:options.php');}
}
}
}
else
{
	header('location:index.php');

}	
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <tiitle> Mercato Dashboard </tiitle>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <p class=sub>Member login</p>
              </div>
            <div class="card">
                <div class="card-body login-card-body">
                  <p class="login-box-msg">Sign in to start your session</p>
                  
      <form action=" " method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control"name="username" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="ion-ios-person"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <input class="btn btn-primary btn-block" type="submit" name="signIn" value="Sign In">
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>

    </body>
</html>