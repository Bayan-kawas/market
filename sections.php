

<!DOCTYPE html>
<html>
<head>
<title>The Sections</title>
</head>
<body>

<form action="/market/market.php" method="post">

  <h3>CHANGE IN SECTION DB</h3>
<li>insert to section</li>
 <span>enter name of section:<span><br>
  <input type="text" name="namesection" required><br><br>
  <span>enter description:</span><br>
  <input type="text" name="description"required><br><br>
 <span> enter urlimg:</span><br>
  <input type="url" name="urlimg"required><br><br>
  <input class=sub type="submit" name="insertsection" value="insert section"><br><br><br>
</form>


<form action="/market/market.php" method="post">
<li>delet section</li>
<span>enter section id:</span><br>
<input type="number" name="id" min=1 required ><br><br>
<input class=sub type="submit" name="deletsection" value="delet section"><br><br>


</form>
</body>
</html>

		
<?php
require 'connection.PHP';
//read (SELECT) data from DB
$query="SELECT * FROM `base` WHERE 1";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{?>
<html>
<head><link rel="stylesheet" href="design.css">
<style>
  div.section{margin-top:-500px;height:400px}
</style>

</head>
<body>

<div class=section <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
<thead><tr class="header">
<td><?php	echo "id";?></td>
<td><?php echo"section name ";?></td>
<td><?php echo"the description";?></td>
<td class="url"><?php echo"The url of img";?></td>
<td><?php echo"rate"?></td> 
<td><?php echo"total rate"?></td>
</tr></thead>

 <?php while($row=mysqli_fetch_assoc($result))
  {

  ?>  

<tbody><tr>
<td class=id><?php echo$row["id"];?></td>
<td><?php echo$row["p_product"];?></td>
<td><?php echo$row["desc"];?></td>
<td class="url"><?php echo$row["img"] ;?></td>
<td class=analys><?php echo$row["num_rate"];?></td>
<td class=analys><?php echo$row["total_rate"];?></td></tr></tbody>
<?php
   }?> 

</table></div>
</body>
</html>
<?php
}
else 
{
  echo "NO record";
}
mysqli_free_result($result);
//--


?>
