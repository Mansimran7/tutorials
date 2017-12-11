<!DOCTYPE html>
<html>
<head>
	<title>sign up </title>
<style>
body {
    background-color:white;
}
a:link, a:visited {
    background-color:purple;
    background-image: url("backgroundgif.gif");
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    text-align:center;
}


a:hover, a:active {
    background-color:grey;
    text-align:center;
}
</style>
</head>
<body>
<h1 style="text-align:center"> E-COMMERCE DATABASE MANAGEMENT</h1>
<form action="dbms_review.php" method="post">
<br><br>
<table style="background-color:#901B9A" border="7" width="350" height="400" align="center">
<tr>	<td>Name</td>
	<td><input type="text" name="name"></td>
</tr>
<tr><td>Email ID</td>
	<td><input type="text" name="email"></td>
</tr>
<tr><td>Address</td>				
	<td><input type="text" name="address"></td>
</tr>
<tr><td>Country</td>
	<td><input type="text" name="country"></td>
</tr>
<tr>	<td colspan="5" align="center"><input type="submit" name="signup" value="submit"></tr></td> 
</table> 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-align:center" href="http://localhost/dbms/customer_id.php">NEXT</a>
<br>
   <br>
</body>
</html>


<?php

$conn = mysqli_connect('localhost','root','');

if(!$conn)
{
	echo 'not connected to server';
}

if(!mysqli_select_db($conn,'e-commerce'))
{
	echo ' e-commerce database not selected';
}
 if(isset($_POST['signup']))
 {
 	$name=$_POST['name'];
 	$customer_ID=(floor((rand() * 1000)+1));
 	$email=$_POST['email'];
 	$address=$_POST['address'];
 	$country=$_POST['country'];

 	$query= " INSERT INTO customer (customer_ID,name,email,address,country) values('$customer_ID','$name','$email','$address','$country')";



if (mysqli_query($conn, $query))
 {
    echo "New record created successfully";
 } 
 else 
 {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

 }
 ?>