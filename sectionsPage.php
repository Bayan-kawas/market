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
              <h4>Add new section</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Name of section </label>
                  <input type="text" name="namesection" class="form-control" id="exampleInputEmail1" placeholder = "Enter the section name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Description of section </label>
                  <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder = "Enter the description of siction" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Image of section </label>
                  <input type="url" name="urlimg" class="form-control" id="exampleInputEmail1" placeholder = "Enter the url of siction" required>
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="insertsection" value="insertsection" required>Insert section </button>
            <br/>
              </div>
            </form>
          </div>
          <!-- /.box -->
         
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
              <h4>Remove a section  </h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Enter the id of section</label>
                  <input type="number" name="id" class="form-control" id="exampleInputEmail1" placeholder="Enter the id" min=1 required>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="deletsection" value=" delete section" required>Remove </button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- end the left side -->
          
          <!-- /.Left col -->
      </section>
       <!-- /.col (LEFT) -->
       <?php
      $query="SELECT * FROM `base` WHERE 1";
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
                    <td><?php	echo "id";?></td>
                    <td><?php echo"section name ";?></td>
                    <td><?php echo"the description";?></td>
                    <td class="url"><?php echo"The url of img";?></td>
                    <td><?php echo"rate"?></td> 
                    <td><?php echo"total rate"?></td>
                    </tr>
                  </thead>
                  <?php while ($row=mysqli_fetch_assoc($result))
                    {?>
                  <tbody>
                    <tr>
                    <td class=id><?php echo$row["id"];?></td>
                    <td><?php echo$row["p_product"];?></td>
                    <td><?php echo$row["desc"];?></td>
                    <td class="url"><?php echo$row["img"] ;?></td>
                    <td class=analys><?php echo$row["num_rate"];?></td>
                    <td class=analys><?php echo$row["total_rate"];?></td>
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
  //***insert to section
 
 if(isset($_POST['insertsection']))
 {
  $namesection = filter_var($_POST['namesection'],FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
$GLOBALS['urlimg']=filter_var($_POST['urlimg'],FILTER_SANITIZE_URL);
 if(filter_var($GLOBALS['urlimg'],FILTER_VALIDATE_URL)!==false){
  $sql="INSERT INTO `base`( `p_product`, `desc`, `img`) VALUES ("."'".$namesection."'".","."'".
  $description."'".","."'".$GLOBALS['urlimg'] ."'".")" ;
 
  if(mysqli_query($conn,$sql))
  {
    echo "Insert A New Section . ";
    echo "<meta http-equiv='refresh' content='0'>";
  }
 else 
 {
  echo "NOT inserted";
  } 
   }
   else {
     header('location:sectionsPage.php');
    }
  }

   //** DELET SECTION 
   echo '<br>';

   if(isset($_POST['deletsection'])){
     $section_id  =$_POST['id'];
     $sql="SELECT `id` FROM `base` WHERE id=".$section_id;
     $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0){
   $sql2="DELETE FROM `base` WHERE id =".$section_id;
   if(mysqli_query($conn,$sql2)){
      echo "You Are Deleted Section Number".'\"'.$section_id.'\"' .",";
      echo "<meta http-equiv='refresh' content='0'>";
    }else 
   {
     echo "NOT deleted ";
   }
   // delet item with delet section 
     
   
   $sql3="DELETE FROM `item` WHERE b_id =".$section_id;
   
   if(mysqli_query($conn,$sql3)){
      echo "And Delet His Items.";
      echo "<meta http-equiv='refresh' content='0'>";
    }
   
   else{
     echo "NOT deleted ";
   }
   }else {
     header("location:sectionsPage.php");
    }
  }