
<!DOCTYPE html>
<html>
<head>
<title>register employee</title>
</head>
<body>

	
<form action="/market/market.php" method="post">
<br><br>
<h3>Add a new employee </h3>
Enter The New Employee Name : <br>
<input type="text" name="username"  placeholder="username" required><br><br>
Enter The New Employee Password : <br>
<input type="password" name="password" placeholder="Password" required><br><br>
Enter The Passowrd Confirmation : <br>
<input type="password" name="confirmation" placeholder="password confirmation"required><br><br>
Enter The Employee's Authority:
<input type="number" name="Authority" min="0" max="1" placeholder="0 or 1" required>
<br><br><br>
<input type="submit" name="register" value="Register"><br><br>

<hr color="888" />
<hr color="888" />
</form>
</body>
</html>
