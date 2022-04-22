<?php
require_once("../db-connect.php");
if((!isset($_GET["name"])) || (!isset($_GET["code"])) || (!isset($_GET["content"])) || (!isset($_GET["date"])) || (!isset($_GET["discount"]))){
  header("404.php");
  exit;
}

//The only two that shouldn't have repeats, the other two are fine
$name=$_GET["name"];
$code=$_GET["code"];
$content=$_GET["content"];
$date=$_GET["date"];
$discount=$_GET["discount"];
$today=date("Y-m-d"); 


if(empty($name) || empty($code) || empty($content) || empty($date) || empty($discount)){
  exit("one or more boxes are empty");
}

if($date < $today){
exit("the expiry date cannot be before today");
}



$select = mysqli_query($conn, "SELECT * FROM coupons WHERE coupon_code = '".$_GET["code"]."'");
if(mysqli_num_rows($select)) {
    exit('This Coupon Already Exists');
}else{


$sql="INSERT INTO coupons (coupon_name, coupon_code, coupon_content, coupon_expiry_date, coupon_discount) VALUES ('$name', '$code', '$content', '$date', '$discount')";
if ($conn->query($sql) === TRUE) {
  echo "You have created a coupon!";
  header("location: ../goral_bike_layout/goral_biker_coupons_create.php");
} else {
  echo "Error" . $conn->error;
}
// header("location: coupons_alter.php");
}
$conn->close();

?>