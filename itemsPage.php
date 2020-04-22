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
              <h4>Add new item</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Name of item </label>
                  <input type="text" name="nameitem" class="form-control" id="exampleInputEmail1" placeholder = "Enter the section name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">The quantity </label>
                  <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" placeholder = "Enter the description of siction" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">The price </label>
                  <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder = "Enter the url of siction" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">The id of section </label>
                  <input type="number" name="secid" class="form-control" min=1  id="exampleInputEmail1" placeholder = "Enter the url of siction" required>
                </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="insertitem" value="insertitem" required>Insert Item </button>
            <br/>
              </div>
            </form>
          </div>
          <!-- /.box -->
         
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
              <h4>Delet an item  </h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action=" " method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputMessage">Enter the id of item</label>
                  <input type="number" name="itemid" class="form-control" id="exampleInputEmail1" placeholder="Enter the id" min=1 required>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name ="deletitem" value ="delete item" required>Remove </button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          <!-- end the left side -->
          
          <!-- /.Left col -->
      </section>
       <!-- /.col (LEFT) -->
       <?php
     $query="SELECT * FROM `item` WHERE 1";
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
                    <td>id</td>
                    <td> <?php echo  "product name ";?></td>
                    <td><?php echo "the quantity";?></td>
                    <td><?php echo "the price";?></td>
                    <td><?php echo"the section id";?></td>
                    <td><?php echo"the favorite product";?></td>
                  </thead>
                  <?php while ($row=mysqli_fetch_assoc($result))
                    {?>
                  <tbody>
                    <tr>
                    <td> <?php echo $row["id"]; ?></td>     
                    <td> <?php echo$row["product"];?></td>                    
                    <td> <?php echo $row["kilo"];?></td>                   
                    <td> <?php echo $row["price"];?></td>
                    <td> <?php echo $row["b_id"];?></td>
                    <td> <?php echo $row["fav"];?></td>
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
//CHANGE IN item DB

//insert item



if(isset($_POST['insertitem']))
 {
  $nameitem=filter_var($_POST['nameitem'],FILTER_SANITIZE_STRING);
$quantity=filter_var($_POST['quantity'],FILTER_SANITIZE_STRING);
$price   =filter_var($_POST['price'],FILTER_SANITIZE_STRING);
$sec_id  =$_POST['secid'];
 $sql4="INSERT INTO `item`( `product`, `kilo`, `price`, `b_id`) VALUES ("."'".$nameitem."'".","."'".$quantity."'".","."'".$price."'".",".$sec_id .")";
 // echo $sql;
  if(mysqli_query($conn,$sql4))
{
  echo "inserted";
  echo "<meta http-equiv='refresh' content='0'>";
}
else 
{
  echo "NOT inserted";
}
 }

 //delet item 
if(isset($_POST['deletitem'])){
  $item_id=$_POST['itemid'];
$sql="SELECT `id` FROM `item` WHERE id=".$item_id;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
$sql5="DELETE FROM `item` WHERE id =".$item_id;

if(mysqli_query($conn,$sql5)){
  echo "deleted";
  echo "<meta http-equiv='refresh' content='0'>";
}
else {
  echo "NOT deleted ";
} 
}else{
  header("location:item.php");
}
}