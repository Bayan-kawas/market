<!DOCTYPE html>
<html>
<head>
<title>The Proposals</title>
<link rel="stylesheet" href="design.css">
</head>
<body>
	<h3> Change In Proposal Database</h3>
		The proposals:<br><br>	
<link rel="stylesheet" href="design.css">
<style>
  div.pro{margin-top:20px;height:300px}
</style>
</head>
<body>
 
 <?php require 'connection.PHP';
 $sql="SELECT * FROM `proposals` WHERE 1";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
{?>
<div class=pro <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
          <thead> <tr class=header>
        	  <td><?php echo "id";?></td>
            <td><?php echo "proposal";?></td>
            <td><?php echo "the date ";?></td>
         	</tr></thead>
  <?php while($row=mysqli_fetch_assoc($result))
       {
         ?>
         	<tr>
         	<td><?php echo $row['id'] ;?></td>
         	<td><?php echo $row['proposals'] ;?></td>
         	<td><?php echo $row['date'];?></td>
            </tr>
        <?php } } ?> 

       </table></div>
      
		



	<form action="/market/market.php" method="post">
		clear selected proposals :<br><br>
		From id:
		<input type="number" name="idfrom" min=1 required><br><br>
		To id:
        <input type="number" name="idto" min=1 required><br><br>
        <input type="submit" name="clear" value="clear selected proposals"><br><br>

	</form>
    

    <form action="/market/market.php" method="post">
     <input type="submit" name="clearall" value="Clear All"><br><br>
    </form>	






</body>
</html>
