
<?php 
session_start();
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="managerPage.php" class="brand-link">
      <img src="./dist/img/logo.png" alt="Mercato Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mercato</span>
    </a>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
         <a href="#" class="d-block"><?php echo $_SESSION['uname']?></a>
      </div>
    </div>
<!-- Sidebar Menu -->
<nav class="mt-2">
<?php
require 'connection.php';
$query="SELECT `auth` FROM `log_in` WHERE user_name="."'".$_SESSION['uname']."'"." AND password ="."'".$_SESSION['pass']."'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
if ($row["auth"]==1){
echo "
<ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class='nav-item has-treeview menu-open'>
          <a href='addEmployeePage.php' class='nav-link active'>
            <p>
            Add New Employee
            </p>
          </a>
        </li>
</ul> ";
}
}
}
  ?>

  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open"> 
            <a href="#" class="nav-link active">
            <p>
              Options
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="sectionsPage.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change In Sections</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="itemsPage.php " class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change In products</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="offersPage.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change in Offers</p>
                  </a>
                </li>  
            </ul>
           
</li>
</ul>
</nav>
</div>
</aside>
</div>
</body>
</html>
