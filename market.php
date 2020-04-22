<!DOCTYPE html>

  <head>
   <meta charset="utf-8">
   </head>
   </html>
<?php

//header('Content-Type: charset=utf-8');



require 'connection.PHP';
  
    /*
  mysql_query("SET character_set_results = 'utf8'");
mysql_query("character_set_client = 'utf8'"); 
mysql_query("character_set_connection = 'utf8'");  
mysql_query("character_set_database = 'utf8'");

*/


//if (isset($_POST['base'])=="base") {
 /* mysql_query("SET NAMES utf8");
  mysql_query("SET CHARACTER SET utf8");
  mysql_query("set character_set_server='utf8'");*/
 // mysqli_set_charset($conn,"utf8");

/*mysqli_set_charset($conn,"utf8");
  $query="SELECT * FROM `base` ORDER BY `id` ASC";
  $result=mysqli_query($conn,$query);


  if ($result) {

      


       
  	while ($row=mysqli_fetch_assoc($result)) {
  		
        $data []=$row;

   
  	}
  	 print(json_encode($data));

   
  }*/

 // }



//-------------------------
//rate of sections
session_start();
if(isset($_SESSION['rate_section']))
{

$ssql="SELECT  `p_product`, `num_rate`, `total_rate` FROM `base` WHERE 1";
$Result=mysqli_query($conn,$ssql);
if(mysqli_num_rows($Result)>0)
 { ?>
 
  
<html>
  <body>
  <head>
<link rel="stylesheet" href="design.css">
<style>
  div.insertm{margin-top:20px;height:300px}
</style>
</head>
<body><p style="text-align: center">Rate Of Sections</p>
 <div class=insertm <?php if(mysqli_num_rows($Result)<10) {?>style="height:auto"<?php } ?>><table>
   <thead><tr class=header>
   <td><?php echo"section name"?></td>
   <td><?php echo " rate of srction "?></td>
  </tr> </thead>
 <?php while ($row4=mysqli_fetch_assoc($Result))
   { 
    if($row4['num_rate']>0)
    { ?>
    <tbody><tr>
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
    
   } ?></table></div></body></html>
 <?php  
 }
 session_unset();
 session_destroy();
}
//---------------------------
//the favourite products

if(isset($_SESSION['favproduct']))
{
$sql="SELECT `product`, `fav` FROM `item` WHERE 1";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
 {?>
<html>
  <body>
  <head>
<link rel="stylesheet" href="design.css">
<style>
  div.fav{margin-top:20px;height:300px}
</style>
</head>
<body><p style="text-align: center">product preference grade</p>
 <div class=fav <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
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
   
   <?php }?></table></div></body></html>
 <?php }
   session_unset();
   session_destroy();
}
//---------------------------



































?>