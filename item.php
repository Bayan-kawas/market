<!DOCTYPE html>
<html>
<head>
<title>The Products</title>
<link rel="stylesheet" href="design.css">
</head>
<body>

<form action="/market/market.php" method="post">
<h3>CHANGE IN ITEM DB</h3><br>
<h4> add new item to database</h4>
enter name of item <br>
<input type="text" name="nameitem" required><br><br>
enter the quantity:<br>
<input type="text" name="quantity" required><br><br>
enter the price :<br>
<input type="text" name="price" required><br><br>
enter the section id :<br>
<input type="number" name="secid" min=1 required><br><br>
<input type="submit" name="insertitem" value="insert item">
</form>


<form action="/market/market.php" method="post">
<h4> delet item from database</h4>
enter the item id :<br>
<input type="number" name="itemid" min=1 required><br><br>
<input type="submit" name="deletitem" value="delet item">


</form>
</body>
</html>
<?php
require 'connection.PHP';
//read (SELECT) data from DB
$query2="SELECT * FROM `item` WHERE 1";
$result2=mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)>0)
{?>
<html>
<head>
<style>
  div.message{margin-top:-500px;height:400px}
</style>
</head>
<body>
<div class= message <?php if(mysqli_num_rows($result2)<15) {?>style="height:auto"<?php } ?>><table>
	<thead><tr class="header">
     <td>id</td>
     <td> <?php echo  "product name :";?></td>
     <td><?php echo "the quantity";?></td>
     <td><?php echo "the price";?></td>
     <td><?php echo"the section id";?></td>
     <td><?php echo"the favorite product";?></td>
    </tr></thead>


 <?php while($row2=mysqli_fetch_assoc($result2))
       {
  	?>

    <tbody><tr >
    <td class=id> <?php echo $row2["id"]; ?></td>
     
     <td> <?php echo$row2["product"];?></td>
     
     <td> <?php echo $row2["kilo"];?></td>
      
     <td> <?php echo $row2["price"];?></td>
      
     <td> <?php echo $row2["b_id"];?></td>
      
     <td> <?php echo $row2["fav"];?></td>
    </tr></tbody>

 
  <?php 
       } ?>
</table></div>
<?Php
}
else 
{
  echo "NO record";
}

?>