<?php
require_once("../db-connect.php");
if((!isset($_GET["name"]))){
  header("404.php");
  exit;
}

//The only two that shouldn't have repeats, the other two are fine
$name=$_GET["name"];


if(empty($name)){
  exit("the box is empty");
}



$select = mysqli_query($conn, "SELECT * FROM product_category WHERE product_category_name = '".$_GET["name"]."'");
if(mysqli_num_rows($select)) {
    exit('This Product Category Already Exists');
}else{


$sql="INSERT INTO product_category (product_category_name) VALUES ('$name')";
if ($conn->query($sql) === TRUE) {
  echo "You have created a Product category!";
  header("location: product_category_alter.php");
} else {
  echo "Error" . $conn->error;
}
// header("location: payment_methodalter.php");
}
$conn->close();

?>