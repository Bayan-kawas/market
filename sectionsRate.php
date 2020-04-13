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
      $ssql="SELECT  `p_product`, `num_rate`, `total_rate` FROM `base` WHERE 1";
      $Result=mysqli_query($conn,$ssql);
      if(mysqli_num_rows($Result)>0){
      ?>
          <section class="col-lg-7 connectedSortable">
         <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap table table-hover" >
                  <thead>
                    <tr>
                      <th>Section Name</th>
                      <th>Section Rate</th>
                    </tr>
                  </thead>
                  <?php while ($row4=mysqli_fetch_assoc($Result))
                    { 
                    if($row4['num_rate']>0)
                        { ?>
                  <tbody>
                    <tr>
                      <td><?php echo$row4['p_product']?></td>
                      <td><?php echo$row4['total_rate']/$row4['num_rate'];?></td>
                    </tr>
                    <?php } 
                        else { ?>
                        <tr>
                        <td><?php echo$row4['p_product']?></td>   
                        <td><?php echo "you can\'t divide by zero";?></td>
                        </tr>
                    <?php 
                         }  
                    } ?>
                  </tbody>
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
 