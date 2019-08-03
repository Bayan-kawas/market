<!DOCTYPE html>

  <head>
   <meta charset="utf-8">
   </head>
   </html>
<?php

//header('Content-Type: charset=utf-8');



require 'connection.PHP';
  
    /*
  mysql_query("SET character_set_results = 'utf8'");
mysql_query("character_set_client = 'utf8'"); 
mysql_query("character_set_connection = 'utf8'");  
mysql_query("character_set_database = 'utf8'");

*/


//if (isset($_POST['base'])=="base") {
 /* mysql_query("SET NAMES utf8");
  mysql_query("SET CHARACTER SET utf8");
  mysql_query("set character_set_server='utf8'");*/
 // mysqli_set_charset($conn,"utf8");

/*mysqli_set_charset($conn,"utf8");
  $query="SELECT * FROM `base` ORDER BY `id` ASC";
  $result=mysqli_query($conn,$query);


  if ($result) {

      


       
  	while ($row=mysqli_fetch_assoc($result)) {
  		
        $data []=$row;

   
  	}
  	 print(json_encode($data));

   
  }*/

 // }

//-----------------------------------------------------
  
//CHANGE IN SECTION***************
  echo '<br>';
 

//***insert to section
 
 if(isset($_POST['insertsection']))
 {
  $namesection = filter_var($_POST['namesection'],FILTER_SANITIZE_STRING);
$description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
$GLOBALS['urlimg']=filter_var($_POST['urlimg'],FILTER_SANITIZE_URL);
 if(filter_var($GLOBALS['urlimg'],FILTER_VALIDATE_URL)!==false){
  $sql="INSERT INTO `base`( `p_product`, `desc`, `img`) VALUES ("."'".$namesection."'".","."'".
  $description."'".","."'".$GLOBALS['urlimg'] ."'".")" ;
 
  if(mysqli_query($conn,$sql))
 {
  {?>
 <html><p style="font-style:italic;font-weight: bold;color:#fff;font-size: 20px;margin-top:0px ;margin-left: 20px"><?php echo "Insert A New Section . ";?></p></html>
<?php }

 }
 else 
 {
  echo "NOT inserted";
 } 
   }else {header('location:sections.php');}
 echo '<br>'; 
require 'connection.PHP';
//read (SELECT) data from DB
$query="SELECT * FROM `base` WHERE 1";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{?>
<html>
<head><link rel="stylesheet" href="design.css">
<style>
  div.insert{margin-top:-50px;height:400px}
</style>
</head>
<body>

<div class="insert" <?php if(mysqli_num_rows($result)<10) {?> style=" height:auto"<?php } ?>><table>
<thead><tr class="header">
<td><?php echo "id";?></td>
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

 }
//---------------------------------------------------
 //** DELET SECTION 
  echo '<br>';

if(isset($_POST['deletsection']))
{
  $section_id  =$_POST['id'];
$sql="SELECT `id` FROM `base` WHERE id=".$section_id;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
 {
$sql2="DELETE FROM `base` WHERE id =".$section_id;
if(mysqli_query($conn,$sql2))
{?>
 <html><p style="font-style:italic;font-weight: bold;color:#fff;font-size: 20px"><?php echo "You Are Deleted Section Number".'\"'.$section_id.'\"' .",";?></p></html>
<?php }


else 
{
  echo "NOT deleted ";
}
// delet item with delet section 
  

$sql3="DELETE FROM `item` WHERE b_id =".$section_id;

if(mysqli_query($conn,$sql3))
{?>
 <html><p style="font-style:italic;font-weight: bold;color:#fff;font-size: 20px;margin-top:0px "><?php echo "And Delet His Items.";?></p></html>
<?php }

else 
{
  echo "NOT deleted ";
}
} else {header("location:sections.php");}


require 'connection.PHP';
//read (SELECT) data from DB
$query="SELECT * FROM `base` WHERE 1";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{?>
<html>
<head><link rel="stylesheet" href="design.css">
<style>
  div.delet{margin-top:-90px;height:400px}
</style>

</head>
<body>

<div class=delet  <?php if(mysqli_num_rows($result)<10) {?> style="height:auto"<?php } ?> ><table>
<thead><tr class="header">
<td><?php echo "id";?></td>
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

}
//------
 
//--------------------------------------------

//CHANGE IN item DB

//insert item



if(isset($_POST['insertitem']))
 {
  $nameitem=filter_var($_POST['nameitem'],FILTER_SANITIZE_STRING);
$quantity=filter_var($_POST['quantity'],FILTER_SANITIZE_STRING);
$price   =filter_var($_POST['price'],FILTER_SANITIZE_STRING);
$sec_id  =$_POST['secid'];
 $sql4="INSERT INTO `item`( `product`, `kilo`, `price`, `b_id`) VALUES ("."'".$nameitem."'".","."'".$quantity."'".","."'".$price."'".",".$sec_id .")";
 // echo $sql;
  if(mysqli_query($conn,$sql4))
{
  echo "inserted";
}
else 
{
  echo "NOT inserted";
}

//read (SELECT) data from DB
$query2="SELECT * FROM `item` WHERE 1";
$result2=mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)>0)
{?>
<html>
<head><link rel="stylesheet" href="design.css">
<style>
  div.insertitem{margin-top:-30px;height:400px}
</style>
</head>
<body>
<div class=insertitem  <?php if(mysqli_num_rows($result2)<15) {?>style="height:auto"<?php } ?>><table>
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


}

//delet item 


if(isset($_POST['deletitem']))
{
  $item_id=$_POST['itemid'];
$sql="SELECT `id` FROM `item` WHERE id=".$item_id;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
 {
$sql5="DELETE FROM `item` WHERE id =".$item_id;

if(mysqli_query($conn,$sql5))
{
  echo "deleted";
}
else 
{
  echo "NOT deleted ";
} 
}else{header("location:item.php");}

//read (SELECT) data from DB
$query2="SELECT * FROM `item` WHERE 1";
$result2=mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)>0)
{?>
<html>
<head><link rel="stylesheet" href="design.css">
<style>
  div.deletitem{margin-top:-30px;height:400px}
</style>
</head>
<body>
<div class=deletitem <?php if(mysqli_num_rows($result2)<15) {?>style="height:auto"<?php } ?> > 
<table>
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
       } ?></table></div></body>
</html>

<?Php
}
else 
{
  echo "NO record";
}

}


//---------------------------------------------

//CHANGR IN OFFERS 
//insert to offers
if(isset($_POST['insertoffer']))
{
$new_offer=filter_var($_POST['newoffer'],FILTER_SANITIZE_STRING);
$old_offer=filter_var($_POST['oldoffer'],FILTER_SANITIZE_STRING);
$url      =filter_var($_POST['url'],FILTER_SANITIZE_URL);
if (filter_var($url,FILTER_VALIDATE_URL)!==false){
  $sql6="INSERT INTO `offers`( `offer`, `From_before`, `img`) VALUES ("."'".$new_offer."'".","."'".$old_offer."'".","."'".$url."'".")";
   if(mysqli_query($conn,$sql6))
{
  echo "inserted";
}
else 
{
  echo "NOT inserted";
}
   }else {header('location:offer.php');}
// read from DB
$query3="SELECT * FROM `offers` WHERE 1";
$result3=mysqli_query($conn,$query3);
if(mysqli_num_rows($result3)>0)
{?>
<html>
 <head><link rel="stylesheet" href="design.css">
   <style>
   div.inserto {height:500px ;margin-top:-30px}
   </style> 
 </head>
<body>
<div class="inserto" <?php if(mysqli_num_rows($result3)<10) {?>style="height:auto"<?php } ?>><table>
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



}
//DELET ONE OFFER

if(isset($_POST['deletoffer']))
{
  $offer_id=$_POST['idoffer'];
$sql="SELECT `id` FROM `offers` WHERE id=".$offer_id;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{

  $sql7="DELETE FROM `offers` WHERE id=".$offer_id;

 if(mysqli_query($conn,$sql7))
{
  echo "deleted";
}
else 
{
  echo "NOT deleted ";
}
   }else{header("location:offer.php");}
// read from DB
$query3="SELECT * FROM `offers` WHERE 1";
$result3=mysqli_query($conn,$query3);
if(mysqli_num_rows($result3)>0)
{?>
<html>
 <head><link rel="stylesheet" href="design.css">
   <style>
   div.inserto {height:500px ;margin-top:-30px}
   </style> 
 </head>
<body>
<div class="inserto" <?php if(mysqli_num_rows($result3)<10) {?>style="height:auto"<?php } ?>><table>
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




}
// DELET ALL OFFERS 

if(isset($_POST['deletall']))
{
 $sql8="DELETE FROM `offers` WHERE 1";
  echo "All Offers have been cleared";
}
//---------------------------
//log_in DB


 
if(isset($_POST['register']))
{
$uname =filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$pass= filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$conf=filter_var($_POST['confirmation'],FILTER_SANITIZE_STRING);
$auth=filter_var($_POST['Authority'],FILTER_SANITIZE_STRING);

if($pass==$conf)
 {
  $sqll="INSERT INTO `log_in`(`user_name`, `password`,`conf_password`,`auth`) VALUES ("."'".$uname."'".","."'".$pass."'".","."'".$conf."'".",".$auth.")";
  if(mysqli_query($conn,$sqll))
   {
  echo "inserted";
   }
  else 
   {
  echo "NOT inserted";
   }
 }else {header('location:registration.php');}


} 



//-------------------------
//rate of sections
session_start();
if(isset($_SESSION['rate_section']))
{

$ssql="SELECT  `p_product`, `num_rate`, `total_rate` FROM `base` WHERE 1";
$Result=mysqli_query($conn,$ssql);
if(mysqli_num_rows($Result)>0)
 { ?>
 
  
<html>
  <body>
  <head>
<link rel="stylesheet" href="design.css">
<style>
  div.insertm{margin-top:20px;height:300px}
</style>
</head>
<body><p style="text-align: center">Rate Of Sections</p>
 <div class=insertm <?php if(mysqli_num_rows($Result)<10) {?>style="height:auto"<?php } ?>><table>
   <thead><tr class=header>
   <td><?php echo"section name"?></td>
   <td><?php echo " rate of srction "?></td>
  </tr> </thead>
 <?php while ($row4=mysqli_fetch_assoc($Result))
   { 
    if($row4['num_rate']>0)
    { ?>
    <tbody><tr>
    <td><?php echo$row4['p_product']?></td>
    <td><?php echo$row4['total_rate']/$row4['num_rate'];?></td>
    </tr>

    <?php } 

    else { ?>

    <tr>
     <td><?php echo$row4['p_product']?></td>   
     <td><?php echo "you can\'t divide by zero";?></td>
       </tr></tbody>
   <?php }  
    
   } ?></table></div></body></html>
 <?php  
 }
 session_unset();
 session_destroy();
}
//---------------------------
//the favourite products

if(isset($_SESSION['favproduct']))
{
$sql="SELECT `product`, `fav` FROM `item` WHERE 1";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
 {?>
<html>
  <body>
  <head>
<link rel="stylesheet" href="design.css">
<style>
  div.fav{margin-top:20px;height:300px}
</style>
</head>
<body><p style="text-align: center">product preference grade</p>
 <div class=fav <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
  <thead> <tr class=header>
    <td><?php echo"product name";?></td>
    <td><?php echo"product preference grade";?></td>
    </tr></thead>
   <?php while($row=mysqli_fetch_assoc($result))
    {?>
     
       <tbody> <tr>
   
    <td><?php echo $row['product'];?></td>
    <td><?php echo$row['fav'];?></td>
      </tr></tbody>
   
   <?php }?></table></div></body></html>
 <?php }
   session_unset();
   session_destroy();
}
//---------------------------
//messge DB
//insert to message DB
if(isset($_POST['send']))
{
  $message=filter_var($_POST['message'],FILTER_SANITIZE_STRING);
  $admin=filter_var($_POST['administrator'],FILTER_SANITIZE_STRING);

  $sql="INSERT INTO `note_and_message`( `note`, `Administrator`) VALUES ("."'".trim($message)."'".","."'".trim($admin)."'".")";
  if(mysqli_query($conn,$sql))
   {
    echo"inserted";
   }
  else {echo "not insert";}
// read from DB
$query="SELECT * FROM `note_and_message` WHERE 1";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{?><html>
  <body>
  <head>
<link rel="stylesheet" href="design.css">
<style>
  div.insertm{margin-top:20px;height:300px}
</style>
</head>
 <div class=insertm <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
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


}
//delet message 
if(isset($_POST['deletmessage']))
{
  $id=$_POST['id'];
  $sql="SELECT `id` FROM `note_and_message` WHERE id=".$id;
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
 {

$sql2="DELETE FROM `note_and_message` WHERE id =".$id;

if(mysqli_query($conn,$sql2))
   {
  echo"deleted message number".$id;
   }
else {
  echo "not deleted number".$id;
     }
  }else{header('location:message.php');}
// read from DB
$query="SELECT * FROM `note_and_message` WHERE 1";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
{?><html>
  <body>
  <head>
<link rel="stylesheet" href="design.css">
<style>
  div.deletm{margin-top:20px;height:300px}
</style>
</head>
 <div class=deletm <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
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



}
//---------------------------------
//proposal
//delete selected proposal
if (isset($_POST['clear']))
{
 $from=$_POST['idfrom'];
 $to=$_POST['idto'];
$sql2="SELECT `id` FROM `proposals` WHERE id=".$from;
$result1=mysqli_query($conn,$sql2);
$sql3="SELECT `id` FROM `proposals` WHERE id=".$to;
$result2=mysqli_query($conn,$sql3);
if(mysqli_num_rows($result1)>0&&mysqli_num_rows($result2)>0)
 {


  for($i=$from;$i<=$to;$i++)
   {
    $sql="DELETE FROM `proposals` WHERE id=".$i;
    if(mysqli_query($conn,$sql))
      {
     echo"deleted proposal number".$i."<br>";
      }
else {
  echo "not deleted proposal number".$i."<br>";
     }
   }
  }else {header("location:proposal.php");}
//read DB
    
        $sql="SELECT * FROM `proposals` WHERE 1";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {?>

  <html>
  <head>
<link rel="stylesheet" href="design.css">
<style>
  div.pro{margin-top:20px;height:300px}
</style>
</head>
<body>
 <div class=pro <?php if(mysqli_num_rows($result)<10) {?>style="height:auto"<?php } ?>><table>
  <thead> <tr class=header>
          <td><?php echo "id";?></td>
            <td><?php echo "proposal";?></td>
            <td><?php echo "the date ";?></td>
          </tr></thead>
         <?php while($row=mysqli_fetch_assoc($result))
         {
         ?>
          <tbody><tr>
          <td><?php echo $row['id'] ;?></td>
          <td><?php echo $row['proposals'] ;?></td>
          <td><?php echo $row['date'];?></td>
            </tr></tbody>
        <?php } ?>
       </table></div></body></html>
       <?php } 
    

}


//delet all proposal
if (isset($_POST['clearall']))
{ 
$sql="DELETE FROM `proposals` WHERE 1";
    if(mysqli_query($conn,$sql))
   {
  echo"Deleted All Proposals";
   }
else {
  echo "Not Deleted All Proposals";
     }
}



































?>