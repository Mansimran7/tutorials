
<?php

 if(isset($_POST['signup']))
 {
    $valuetosearch = $_POST['customer_id'];
    $query = "SELECT * FROM `customer` WHERE CONCAT (`customer_id`, `name`, `email`, `address`, `country` ) LIKE '%".$valuetosearch."%';";
    $query_next= " SELECT * FROM `product_final` WHERE CONCAT (`customer_id`, `product_id`, `quantity`, `price`) LIKE '%".$valuetosearch."%';";
    $query_next_shipper = "SELECT * FROM `shipper` WHERE shipper_id = '1'";
    $query_next_supplier = "SELECT * FROM `supplier` WHERE supplier_id = '1'";
    $search_result = filtertable($query);
    $search_result_new = filtertable_new($query_next);
    $search_result_new_shipper = filtertable_new_shipper($query_next_shipper);
    $search_result_new_supplier = filtertable_new_supplier($query_next_supplier);
    
    
 }
else
{
    $query = "SELECT * from `customer`";
    $query_next = "SELECT * from `product_final`";  
    $query_next_shipper = "SELECT * from `shipper`";  
    $query_next_supplier = "SELECT * from `supplier`";  
    $search_result = filtertable($query);
    $search_result_new = filtertable_new($query_next);
    $search_result_new_shipper = filtertable_new_shipper($query_next_shipper);
    $search_result_new_supplier = filtertable_new_supplier($query_next_supplier);
      
} 


function filtertable($query1)
{
  $connect = mysqli_connect("localhost","root","","e-commerce");
  $filter_result = mysqli_query($connect,$query1);
  return $filter_result;
}

function filtertable_new($query1_next)
{
  $connect = mysqli_connect("localhost","root","","e-commerce");
  $filter_result = mysqli_query($connect,$query1_next);
  return $filter_result;
}
function filtertable_new_shipper($query1_next_shipper)
{
  $connect = mysqli_connect("localhost","root","","e-commerce");
  $filter_result = mysqli_query($connect,$query1_next_shipper);
  return $filter_result;
}function filtertable_new_supplier($query1_next_supplier)
{
  $connect = mysqli_connect("localhost","root","","e-commerce");
  $filter_result = mysqli_query($connect,$query1_next_supplier);
  return $filter_result;
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.0/js/materialize.min.js"></script>

	<title> billing page  </title>
<style>
body {
    background-color:white;
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

<h1 style="text-align:center;font-size: 40px"> Enter you Customer ID to get the bill details</h1>
<form method="post">
<br><br>
 <div class="row">
      <div class="col s3"></div>
      <div class="col s6">
          
    
<tr> <td><input type="text" name="customer_id"></td>
</tr>
<br><br>
<tr>    <td colspan="5" align="center"><input type="submit" name="signup" value="submit"></tr></td> 
<br>
<br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br>

<?php while($row = mysqli_fetch_array($search_result)) : ?>
    <? system('clear'); ?>
    <?php echo "CUSTOMER ID: " ; ?>
    <?php echo $row['customer_id'] ; ?>
    <br>

    <?php echo "Name:  " ; ?>
    <?php echo $row['name'] ; ?>
    <br>
    
    <?php echo "EMAIL ID: " ; ?>
    <?php echo $row['email'] ; ?>
    <br>

    <?php echo "DELIVERY ADDRESS: " ; ?>
    <?php echo $row['address'] ; ?>
    <br>

    <?php echo "COUNTRY: " ; ?>
    <?php echo $row['country'] ; ?>
    <br>

    <?php endwhile;?> 

<?php while($row = mysqli_fetch_array($search_result_new)) : ?>
    <?php echo "PRODUCT ID: " ; ?>
    <?php echo $row['product_id'] ; ?>
    <br>
    <?php echo "QUANTITY: " ; ?>
    <?php echo $row['quantity'] ; ?>
    <br>
    <?php echo "TOTAL PRICE: " ; ?>
    <?php echo $row['price'] ; ?>
    <br>
     <?php endwhile;?> 

     <?php while($row = mysqli_fetch_array($search_result_new_shipper)) : ?>

    <?php echo "NAME OF THE SHIPPER: " ; ?>
    <?php echo $row['companyname'] ; ?>

    <br>
    <?php echo "CONTACT DETAILS OF SHIPPER" ; ?>
    <?php echo $row['phone'] ; ?>
    <br>
    <?php endwhile;?> 

    <?php while($row = mysqli_fetch_array($search_result_new_supplier)) : ?>

    <?php echo "NAME OF SUPPLIER: " ; ?>
    <?php echo $row['name_supplier'] ; ?>
    <br>
    <?php echo "NAME OF THE SUPPLIER: " ; ?>
    <?php echo $row['companyname'] ; ?>
    <br>
    <?php echo "CONTACT DETAILS OF SUPPLIER: " ; ?>
    <?php echo $row['contact'] ; ?> 
     <br>
    <?php echo "E-MAIL ID OF SUPPLIER: " ; ?>
    <?php echo $row['email'] ; ?> 
    <br>
   <?php endwhile;?> 




      </div>
      <div class="col s3"></div>
    </div>

</body>
</html>



