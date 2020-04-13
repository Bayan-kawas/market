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
     <?php
      $sql="SELECT `product`, `fav` FROM `item` WHERE 1";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
       {?>
      <section class="col-lg-7 connectedSortable">
         <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
           <table class="table table-head-fixed text-nowrap table table-hover" >    
            <thead> <tr class=header>
              <td><?php echo"product name";?></td>
              <td><?php echo"product preference grade";?></td>
              </tr></thead>
             <?php while($row=mysqli_fetch_assoc($result))
              {?> 
              <tbody> <tr>
             <td><?php echo $row['product'];?></td>
              <td><?php echo$row['fav'];?></td>
                </tr></tbody>
             <?php }?>
           </table>
          </div>
          <!-- /.card-body -->
        <!-- /.card -->
         </div>
            <!-- /.row -->
        </section>
        <?php }
                  ?>
          <!-- /.Left col -->
      <section class="col-lg-5 connectedSortable">
        <!-- /.col (LEFT) -->
      
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="barChart"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          <!-- /.col (RIGHT) -->
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

        <!-- /.wrapper -->
  
</html>
<?php
 require 'scripts.php';
 ?>
 