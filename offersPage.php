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
              <h4>Add new offer</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">The new offer </label>
                  <input type="text" name="newoffer" class="form-control" id="exampleInputEmail1" placeholder = "Enter the new offer" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Insted of </label>
                  <input type="text" name="oldoffer" class="form-control" id="exampleInputEmail1" placeholder = "Enter the old offer " required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Image of offer </label>
                  <input type="url" name="url" class="form-control" id="exampleInputEmail1" placeholder = "Enter the url of siction" required>
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="insertoffer" value="insert new offer" required>Insert New Offer </button>
            <br/>
              </div>
            </form>
          </div>
          <!-- /.box -->
         
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
              <h4>Remove a offer  </h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Enter the id of offer</label>
                  <input type="number" name="idoffer" class="form-control" id="exampleInputEmail1" placeholder="Enter the id" min=1 required>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="deletoffer" value=" delete offer" required>Delete Offer</button>
              </div>
            </form>
          </div>

          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
              <h4>Remove all offers  </h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="deletall" value=" delete offer" required>Delete All Offers</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- end the left side -->
          
          <!-- /.Left col -->
      </section>
       <!-- /.col (LEFT) -->
       <?php
      $query="SELECT * FROM `offers` WHERE 1";
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
                    <td><?php echo "id"?></td>
                    <td><?php echo "the old offer"?></td>
                    <td><?php echo"the new offer"?></td>
                    <td><?php echo"the url img"?></td>
                    </tr>
                  </thead>
                  <?php while ($row=mysqli_fetch_assoc($result))
                    {?>
                  <tbody>
                    <tr>
                    <td><?php echo $row["id"] ?></td>      
                    <td><?php echo $row["offer"]?></td>                   
                    <td><?php echo $row["From_before"]?></td>                    
                    <td><?php echo $row["img"]?></td>
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
      <?php
 require 'layout/footer.php';
?>
  </div>
  </body>
  </html>
  
  <?php

if(isset($_POST['insertoffer']))
{
$new_offer=filter_var($_POST['newoffer'],FILTER_SANITIZE_STRING);
$old_offer=filter_var($_POST['oldoffer'],FILTER_SANITIZE_STRING);
$url      =filter_var($_POST['url'],FILTER_SANITIZE_URL);
if (filter_var($url,FILTER_VALIDATE_URL)!==false){
  
  $sql="INSERT INTO `offers`( `offer`, `From_before`, `img`) VALUES ("."'".$new_offer."'".","."'".$old_offer."'".","."'".$url."'".")";
   if(mysqli_query($conn,$sql))
{
  echo "inserted";
  echo "<meta http-equiv='refresh' content='0'>";
}
else 
{
  echo "NOT inserted";
}
   }else { 
     header('location:offersPage.php');
    }
  }


//DELET ONE OFFER

if(isset($_POST['deletoffer']))
{
  $offer_id=$_POST['idoffer'];
$sql="SELECT `id` FROM `offers` WHERE id=".$offer_id;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{

  $sql="DELETE FROM `offers` WHERE id=".$offer_id;

 if(mysqli_query($conn,$sql))
{
  echo "deleted";
  echo "<meta http-equiv='refresh' content='0'>";
}
else 
{
  echo "NOT deleted ";
}
   }else{header("location:offersPage.php");}  

  }


// DELET ALL OFFERS 

if(isset($_POST['deletall']))
{
 $sql="DELETE FROM `offers` WHERE 1";
 if(mysqli_query($conn,$sql)){
  echo "All Offers have been cleared";
  echo "<meta http-equiv='refresh' content='0'>";
 }
}