<!DOCTYPE html>
<html>
<head>
	<title>
		billing page
	</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.0/js/materialize.min.js"></script>
<style>
a:link, a:visited {
    background-color:purple;
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
.header {
    background-color: #f1f1f1;
    padding: 5px;
    font-size: 45px;
    text-align: center;
}

</style>

</head>
<body>


<div class="header">
  <h1>E-commerce data base management</h1>
</div>
 <div class="row">
      <div class="col s2"></div>
      <div class="col s8">
      	<h2  style="text-align:center;font-size:40px;">Enter your details to complete transaction </h2>
<form action="billing.php" method="post">

 <div class="row">
      <div class="col s2"></div>
      <div class="col s8">  Enter the credit card type (VISA / MASTERCARD/ AMERICAN EXPRESS) <br>
  <input type="text" name="creditcardtype"><br>

  </div>
      <div class="col s2"></div>
    </div>
  
  
 <div class="row">
      <div class="col s2"></div>
      <div class="col s8">Enter the credit card no.(16 digit number)<br>

  <input type="text" name="creditcard_no"><br></div>
      <div class="col s2"></div>
    </div>

	  
 <div class="row">
      <div class="col s2"></div>
      <div class="col s8">
  Enter the credit card expiry date(mm/yyyy) 

  <input type="text" name="creditcard_expiry"><br>
  
 <div class="row">
      <div class="col s3"></div>
      <div class="col s6">
      	<input type="submit" name="signup" value="submit">

	</form>
	<br><br>
	<a style="text-align:center" href="http://localhost/dbms/bill_display.php">go to bill </a>

      </div>
      <div class="col s3"></div>
    </div>
  

  </div>
      <div class="col s2"></div>
    </div>

      </div>


      <div class="col s2"></div>
    </div>
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
 	$Bill_date=date('d');
 	$Billing_id=(floor((rand() * 1000)+1));
 	$creditcardtype=$_POST['creditcardtype'];
 	$creditcard_no=$_POST['creditcard_no'];
 	$creditcard_expiry=$_POST['creditcard_expiry'];

 	$query= " INSERT INTO bill_table (Bill_date,Billing_id,creditcardtype,creditcard_no,creditcard_expiry) values('$Bill_date','$Billing_id','$creditcardtype','$creditcard_no','$creditcard_expiry')";


if (mysqli_query($conn, $query))
 {
    echo "Transaction completed";
 } 
 else 
 {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

 }
 ?>