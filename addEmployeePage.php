
<?php
require 'layout/styles.html';
require 'layout/header.php';
require 'layout/sidebar.php';
require 'connection.PHP';
?>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <section class="content">
      <div class="container-fluid">
      <div class="row">
      <?php 
        require 'optionsBox.php';
       ?>
     </div>
      <div class="row">
      <section class="col-lg-5 connectedSortable">
        <!-- left column -->
        <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
              <h4>Add new Employee</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Enter The New Employee Name </label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder = "Employee Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Enter The New Employee Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder = "Employee Password " required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Enter The Passowrd Confirmation</label>
                  <input type="password" name="confirmation" class="form-control" id="exampleInputEmail1" placeholder = "Employee Password " required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Enter The Employee's Authority</label>
                  <input type="number" name="Authority" min="0" max="1" class="form-control" id="exampleInputEmail1" placeholder = "0 or 1 " required>
                </div>
                
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="register" value="register" required>Add The Employee </button>
            <br/>
              </div>
            </form>
          </div>
          </div>
      </section>
       <!-- /.col (LEFT) -->
        </div>
      </div>
          </section>
</div>
      <?php
 require 'layout/footer.php';
?>
  </div>
  </body>
  </html>
  
 <?php
 //log_in DB 
if(isset($_POST['register']))
{
$uname =filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$pass= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$conf=filter_var($_POST['confirmation'],FILTER_SANITIZE_STRING);
$auth=filter_var($_POST['Authority'],FILTER_SANITIZE_STRING);

if($pass==$conf)
 {
  $sqll="INSERT INTO `log_in` (`user_name`, `password`,`conf_password`,`auth`) VALUES ("."'".$uname."'".","."'".$pass."'".","."'".$conf."'".",".$auth.")";
  if(mysqli_query($conn,$sqll)){
  echo "inserted";
   }
  else{
  echo "NOT inserted";
   }
} 
   else{
     header('location:registration.php');
    }
} 
