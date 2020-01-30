<?php
require 'layout/styles.html';
require 'layout/header.php';
require 'layout/sidebar.php';
require 'connection.PHP';
$ssql="SELECT  `p_product`, `num_rate`, `total_rate` FROM `base` WHERE 1";
$Result=mysqli_query($conn,$ssql);
if(mysqli_num_rows($Result)>0)
 { 
?>
<html>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sections Rate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sections Rate</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    //-----------------------class
    <div class="container-fluid ">
    <div class="row">
    <section class="col-lg-6 connectedSortable">
     
         
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
                    <tr>
                          <td>dfdf</td>
                          <td>dfdf</td>
                        </tr>
                        <tr>
                          <td>dfdf</td>
                          <td>dfdf</td>
                        </tr>
                        <tr>
                          <td>dfdf</td>
                          <td>dfdf</td>
                        </tr>
                    <?php } 
                        else { ?>
                        <tr>
                        <td><?php echo$row4['p_product']?></td>   
                        <td><?php echo "you can\'t divide by zero";?></td>
                        </tr>
                  </tbody>
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
      <section class="col-lg-6 connectedSortable">
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
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
     
      
      </section>
      </div>
   </div>

    //------------------------
    
      </div>
        <!-- /.wrapper -->
     </div>
    </body>
</html>
<?php
 }
 require 'layout/footer.php';
 require 'scripts.php';
 ?>
 