<!DOCTYPE html>
<html>
<head>
<title>The Offers</title>
<link rel="stylesheet" href="design.css">
</head>
<body>

<form action="/market/market.php" method="post">
<h3>CHANGE IN OFFER DB</h3><br>
	 <h4>insert offer</h4>
enter a new offer:<br>
<input type="text" name="newoffer" required><br><br>
insted of :<br>
<input type="text" name="oldoffer" required><br><br>
inter the url img:<br>
<input type="url" name="url" required><br><br>
<input type="submit" name="insertoffer" value="insert new offer">
</form>

<form action="/market/market.php" method="post">
<h4>delet one offer</h4>
<input type="number" name="idoffer" min=1 required><br><br>

<input type="submit" name="deletoffer" value="delet offer">

<h4>delet all offer</h4>
<input type="submit" name="deletall" value="delet all">

</form>
</form>
</body>
</html>
<?php
require 'connection.php';
// read from DB
$query3="SELECT * FROM `offers` WHERE 1";
$result3=mysqli_query($conn,$query3);
if(mysqli_num_rows($result3)>0)
{?>
<html>
 <head>
   <style>
   div.bb {height:500px ;margin-top:-530px}
   </style>	
 </head>
<body>
<div class="bb" <?php if(mysqli_num_rows($result3)<10) {?>style="height:auto"<?php } ?>><table>
	<thead><tr class="header">
	 <td><?php echo "id"?></td>
     <td><?php echo "the old offer"?></td>
     <td><?php echo"the new offer"?></td>
     <td><?php echo"the url img"?></td>
    </tr></thead>
 <?php while($row3=mysqli_fetch_assoc($result3))
  {?>
    <tbody><tr>
      <td><?php echo $row3["id"] ?></td>
      
       <td><?php echo $row3["offer"]?></td>
       
       <td><?php echo $row3["From_before"]?></td>
       
       <td><?php echo $row3["img"]?></td>
   </tr></tbody>
 <?php } ?>
</table></div></body></html>
<?php 
}  
else
{
  echo "No record";
}  


?>