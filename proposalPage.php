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
       <!-- Small boxes (Stat box) -->
       <div class="row">
      <?php 
        require 'optionsBox.php';
       ?>
     </div>
    <!-- right col -->
     <div class="row">
      <section class="col-lg-5 connectedSortable">
      <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
              <h4>Remove selected proposals</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">From id</label>
                  <input type="number" name="idfrom" class="form-control" id="exampleInputEmail1" min=1 required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage"> To id </label>
                  <input type="number" name="idto" class="form-control" id="exampleInputEmail1" min=1 required>
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="clear" value="insertitem" required>Remove Selected Proposals </button>
              <br/>
              </div>
            </form>
            <form role="form" action=" " method="post">
            <label for="exampleInputMessage">Remove All Proposals</label>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="clearall" value="insertitem" required>Remove All Proposals </button>
              <br/>
              </div>
            </form>
          </div>
          <!-- /.box -->
         
            <!-- /.row -->
        </section>
        
          <!-- /.Left col -->
          <?php
      $sql="SELECT * FROM `proposals` WHERE 1";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {?>
      <section class="col-lg-7 connectedSortable">
        <!-- /.col (LEFT) -->
        <div class="card">
              <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
           <table class="table table-head-fixed text-nowrap table table-hover" >    
          <thead>
          <tr>
          <td><?php echo "id";?></td>
            <td><?php echo "proposal";?></td>
            <td><?php echo "the date ";?></td>
          </tr>
        </thead>
         <?php while($row=mysqli_fetch_assoc($result))
         {
         ?>
          <tbody><tr>
          <td><?php echo $row['id'] ;?></td>
          <td><?php echo $row['proposals'] ;?></td>
          <td><?php echo $row['date'];?></td>
          </tr>
          </tbody>
        <?php } ?>
       </table>
          </div>
          <!-- /.card-body -->
        <!-- /.card -->
         </div>  
          <!-- /.col (lift) -->
      </section>
         <?php } ?>
  </div>
</div>
</section>
</div>
 <?php
 require 'layout/footer.php';
?>
</div>
</body>

        <!-- /.wrapper -->
  
</html>
<?php
 require 'scripts.php';
 
 //proposal
//delete selected proposal
if (isset($_POST['clear']))
{
 $from=$_POST['idfrom'];
 $to=$_POST['idto'];
$sql2="SELECT `id` FROM `proposals` WHERE id=".$from;
$result1=mysqli_query($conn,$sql2);
$sql3="SELECT `id` FROM `proposals` WHERE id=".$to;
$result2=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result1)>0&&mysqli_num_rows($result2)>0)
 {


  for($i=$from;$i<=$to;$i++)
   {
    $sql="DELETE FROM `proposals` WHERE id=".$i;
    if(mysqli_query($conn,$sql))
      {
     echo"deleted proposal number".$i."<br>";
     echo "<meta http-equiv='refresh' content='0'>";
      }
else {
  echo "not deleted proposal number".$i."<br>";
     }
   }
  }else {header("location:proposal.php");}
}

//delet all proposal
if (isset($_POST['clearall']))
{ 
$sql="DELETE FROM `proposals` WHERE 1";
    if(mysqli_query($conn,$sql))
   {
  echo"Deleted All Proposals";
  echo "<meta http-equiv='refresh' content='0'>";
   }
else {
  echo "Not Deleted All Proposals";
     }
}


