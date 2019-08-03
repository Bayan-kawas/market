<!DOCTYPE html>
<html>
<head>
<title>messages</title>
<link rel="stylesheet" href="design.css">
</head>
<body>
	<form action="/market/market.php" method="post">
		<h3>Add Message</h3><br>
		Enter The message :<br>
		<input type="text" name="message"  required><br>
		
		Administrator Name:<br>
		<input type="text" name="administrator"  required><br><br>
		
		<input type="submit" name="send" value="send" required><br><br>
		</form>

		<form action="/market/market.php" method="post">
		<h3>Remove Message</h3><br>
		Enter Message id:<br>
		<input type="number" name="id" min=1 required max="<?php 
          

		?>" ><br><br>
        
        <input type="submit" name="deletmessage" value="Remove message" required><br><br>



	</form>
</body>
</html>
<?php


require 'connection.PHP';
// read from DB
$query="SELECT * FROM `note_and_message` WHERE 1";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{?><html>
	<body>
	<head>
<link rel="stylesheet" href="design.css">
<style>
  div.section{margin-top:-400px;height:300px}
</style>
</head>
 <div class=section <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
	<thead><tr class=header>
	<td><?php echo "id"?></td>
    <td><?php echo"message "?></td>
    <td><?php echo"administrator"?></td>
    <td><?php echo"Date"?></td>
    </tr></thead>

 <?php while($row=mysqli_fetch_assoc($result))
  {?>
     
    <tbody><tr> 
     <td><?php echo $row["id"]?></td>
     
     <td><?php echo $row["note"]?></td>
     
     <td><?php echo $row["Administrator"]?></td>
      
     <td><?php echo $row["date"]?></td>
    </tr></tbody>
 
  <?php }  ?></table></div></body></html>
<?php
}


/*$sql="SELECT `id` FROM `note_and_message` WHERE 1";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
  while($row=mysqli_fetch_array($result)){
   $x=$row['id'];
   $a=array($x);
   echo count($x);
}
}*/












?>