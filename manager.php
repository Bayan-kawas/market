<?php

if(isset($_POST['options']))
{
header('location:options.php ');
}
if(isset($_POST['AddN_emp']))
{
	header('location:registration.php ');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>


<form action="" method="post">


<input type="submit" name="options" value="options"><br><br>
<input type="submit" name="AddN_emp" value="Add New Employee"><br><br>
</form>
</body>
</html>





