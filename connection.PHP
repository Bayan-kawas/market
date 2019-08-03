<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8">
   </head>
   </html>
<?PHP



$hostname="localhost";
$username="root";
$pass="";
$dbname="market";
$conn=mysqli_connect($hostname,$username,$pass,$dbname);

mysqli_set_charset($conn,"utf8");
/*mysql_query("SET NAMES latin1;");
mysql_query("SET CHARACTER SET latin1");
mysql_query("set character_set_server='utf8'");
mysql_query("SET character_set_results = 'utf8'");
mysql_query("character_set_client = 'utf8'"); 
mysql_query("character_set_connection = 'latin1'");  
mysql_query("character_set_database = 'utf8'");
 //mysql_set_charset('utf8');
*/





?>