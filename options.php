<?php




//----------
if(isset($_POST['changsec']))
{
	
	
	header('location:sections.php ');
	
}
//----------
if(isset($_POST['changitem']))
{
	header('location:item.php ');
}

//----------
if(isset($_POST['changoffer']))
{
	header('location:offer.php ');
}
//----------
if(isset($_POST['ratesection']))
{
    session_start();
	$_SESSION['rate_section']=$_POST['ratesection'];
	header('location:/market/market.php');
}
//----------
if(isset($_POST['favouriteproduct']))
{
    session_start();
	$_SESSION['favproduct']=$_POST['favouriteproduct'];
	header('location:/market/market.php');
}
//----------
if(isset($_POST['ad_message']))
{
	header('location:message.php ');
}
//----------
if(isset($_POST['Proposal']))
{
	header('location:Proposal.php ');
}




?>
<!DOCTYPE html>
<html>
<head>
<title>options</title>
</head>
<body>

<form action="" method="POST">
<input type="submit" name="changsec" value="Change In Sections"><br><br>
<input type="submit" name="changitem" value="Change In products"><br><br>
<input type="submit" name="changoffer" value="Change In Offers"><br><br>

<input type="submit" name="ratesection" value="Rate Of Sections"><br><br>
<input type="submit" name="favouriteproduct" value="product preference grade"><br><br>
<input type="submit" name="ad_message" value="Adminstrative Message"><br><br>
<input type="submit" name="Proposal" value="Proposal"><br><br>


</form>
</body>
</html>

