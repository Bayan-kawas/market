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
              <h4>Add new message </h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Enter the message</label>
                  <input type="text" name="message" class="form-control" id="exampleInputEmail1" placeholder = "Enter the message" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Adminstrator name </label>
                  <input type="text" name="administrator" class="form-control" id="exampleInputEmail1" placeholder = "Enter your name" required>
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="send" value="send " required>Send The Message</button>
            <br/>
              </div>
            </form>
          </div>
          <!-- /.box -->
         
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
              <h4>Remove a message </h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Enter the id of message</label>
                  <input type="number" name="id" class="form-control" id="exampleInputEmail1" placeholder="Enter the id" min=1 required>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="deletmessage" value="Remove message" required>Remove The Message</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- end the left side -->
          
          <!-- /.Left col -->
      </section>
       <!-- /.col (LEFT) -->
       <?php
      $query="SELECT * FROM `note_and_message` WHERE 1";
      $result=mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0)
      {
      ?>
          <section class="col-lg-7 connectedSortable">
         <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap table table-hover" >
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Message</th>
                      <th>Adminstrator</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <?php while ($row=mysqli_fetch_assoc($result))
                    {?>
                  <tbody>
                    <tr>
                      <td><?php echo $row["id"];?></td>
                      <td><?php echo $row["note"];?></td>
                      <td><?php echo $row["Administrator"];?></td>
                      <td><?php echo $row["date"];?></td>
                    </tr>
              
                  </tbody>
                    <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            <!-- /.card -->
         </div>
            <!-- /.row -->
        </section>
        <?php }
        ?>

        </div>
      </div>
          </section>
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
  //messge DB
//insert to message DB
if(isset($_POST['send']))
{
  $message=filter_var($_POST['message'],FILTER_SANITIZE_STRING);
  $admin=filter_var($_POST['administrator'],FILTER_SANITIZE_STRING);

  $sql="INSERT INTO `note_and_message`( `note`, `Administrator`) VALUES ("."'".trim($message)."'".","."'".trim($admin)."'".")";
  if(mysqli_query($conn,$sql))
   {
    echo"inserted";
    echo "<meta http-equiv='refresh' content='0'>";
   }
  else {echo "not insert";}
  }

  //delet message 
if(isset($_POST['deletmessage']))
{
  $id=$_POST['id'];
  $sql="SELECT `id` FROM `note_and_message` WHERE id=".$id;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
 {

$sql2="DELETE FROM `note_and_message` WHERE id =".$id;
if(mysqli_query($conn,$sql2))
   {
  echo"deleted message number".$id;
  echo "<meta http-equiv='refresh' content='0'>";
   }
else {
  echo "not deleted number".$id;
     }
  }else{
    header('location:message.php');
  }
}