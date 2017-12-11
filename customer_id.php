
<?php

 if(isset($_POST['signup']))
 {
    $valuetosearch = $_POST['name'];
    $query = "SELECT * FROM `customer` WHERE CONCAT (`customer_id`, `name`, `email`, `address`, `country` ) LIKE '%".$valuetosearch."%';";
    $search_result = filtertable($query);
    
 }
else
{
    $query = "SELECT * from `customer`";
    $search_result = filtertable($query);
} 


function filtertable($query1)
{
  $connect = mysqli_connect("localhost","root","","e-commerce");
  $filter_result = mysqli_query($connect,$query1);
  return $filter_result;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.0/js/materialize.min.js"></script>

	<title> sign up page </title>
<style>
body {
    background-color:white;
    background-image: url(background.gif);
}
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

<h1 style="text-align:center;font-size:40px;"> Enter you name below to get you customer id</h1>
<form method="post">
<br><br>
<div class="row">
     <div class="col s4"></div>
      <div class="col s4">
        <tr> <td><input type="text" name="name"></td>
</tr>
<br><br>

 <div class="row">
      <div class="col s1"></div>
      <div class="col s10">
        <tr>    <td colspan="5" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="signup" value="submit"></tr></td> 
<br>
<br><br>
<br><br>
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="text-align:center" href="http://localhost/dbms/product.php#test1">PRODUCT PAGE</a>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br><br>


<?php while($row = mysqli_fetch_array($search_result)) : ?>
    <?php echo "the customer id of " ; ?>
    <?php echo $row['name'] ; ?>
    <?php echo "is";?>
    <?php echo $row['customer_id'] ; ?>

    <?php endwhile;?> 

          

      </div>
      <div class="col s1"></div>
    </div>
      </div>
      
      <div class="col s4"></div>
    </div>

</body>
</html>