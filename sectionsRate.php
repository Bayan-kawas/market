<?php
require 'layout/styles.html';
require 'connection.PHP';
$ssql="SELECT  `p_product`, `num_rate`, `total_rate` FROM `base` WHERE 1";
$Result=mysqli_query($conn,$ssql);
if(mysqli_num_rows($Result)>0)
 { 
?>
<html>
    <body>
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
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
                        </tr></tbody>
                    <?php }  
                        
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
</div>
    </body>
</html>
<?php
 }
 ?>