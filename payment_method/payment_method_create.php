<?php
require_once("db-connect.php");
if((!isset($_GET["name"]))){
  header("404.php");
  exit;
}

//The only two that shouldn't have repeats, the other two are fine
$name=$_GET["name"];


if(empty($name)){
  exit("the box is empty");
}



$select = mysqli_query($conn, "SELECT * FROM payment_method WHERE payment_method_name = '".$_GET["name"]."'");
if(mysqli_num_rows($select)) {
    exit('This Payment Method Already Exists');
}else{


$sql="INSERT INTO payment_method (payment_method_name) VALUES ('$name')";
if ($conn->query($sql) === TRUE) {
  echo "You have created a Payment method!";
  header("location: payment_method_alter.php");
} else {
  echo "Error" . $conn->error;
}
// header("location: payment_methodalter.php");
}
$conn->close();

?>