<?php

require 'connection.PHP';

 if(isset($_POST['login']))
{

$uname = $_POST['username'];
$pass= $_POST['password']; 
$query="SELECT `id` FROM `log_in` WHERE user_name="."'".$uname."'"." AND password ="."'".$pass."'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result)==1)
{
$query2="SELECT `auth` FROM `log_in` WHERE user_name="."'".$uname."'"." AND password ="."'".$pass."'";
$result2 = mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)>0)
{
while($row=mysqli_fetch_assoc($result2))	
{
if ($row["auth"]==1)
		{header('location:manager.php');} 
        else{header('location:options.php');}
}
}
}
else
{
	header('location:login.php');

}	
}

?>

<!DOCTYPE html>
<html>
<head>
<title>register</title>
<style>
body{background: url('img27.jpg') no-repeat}
div{ border :2px solid #a6a6a6;text-align:center;margin:120px;}
p.sub{margin-bottom: -5px;color:#ff9900;font-weight:bolder;opacity: 0.7;font-size: 20px}	
p.main{ font-family:Times,Arial;font-size:20px;font-style:italic;color:#004080; }
input{height:10px; width: 200px;padding:1%;margin:10px;background-color:#f2f2f2;}
input:hover
{
border :2px solid #a6a6a6;background-color:#ffffcc;	
}
input.log{height:35px; width: 220px;margin:5px ;padding: 2px ;font-size: 18px;font-weight: bold;color:#fff;background-color:#001a33;}

</style>
</head>
<body>
	<div>
		<p class=main>Manage Yuor Business In The Best Way</p>
<form action="" method="post">
<p class=sub>Member login</p>
<input type="text" name="username"  placeholder="username" required><br><br>
<input class=pass type="password" name="password" placeholder="Password" required><br><br>
<input class=log type="submit" name="login" value="login"><br><br>
</form>
</div>
</body>
</html>








