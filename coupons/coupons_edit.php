<?php
//Make a sorting thing
require_once("../db-connect.php");
if(!isset($_GET["id"])){
    // header("location: 404.php");
}
$id = $_GET["id"];
$name = $_GET["name"];
$code = $_GET["code"];
$content = $_GET["content"];
$discount = $_GET["discount"];
$date = $_GET["date"];

$name2 = $_GET["name2"];
$code2 = $_GET["code2"];
$content2 = $_GET["content2"];
$discount2 = $_GET["discount2"];
$date2 = $_GET["date2"];

$today = date("Y-m-d");

if(empty($name) || empty($code) || empty($content) || empty($date) || empty($discount)){
    exit("one or more boxes are empty or the discount is 0");
}

if($date < $today){
    exit("the expiry date cannot be before today");
}
if($name == $name2 && $code == $code2 && $content == $content2 && $discount == $discount2 && $date == $date2){
    exit("you didn't edit anything");
}


// $select = mysqli_query($conn, "SELECT * FROM coupons WHERE name = '".$_GET["name"]."'");
// if(mysqli_num_rows($select) == 0) {
//     exit('This Method Does Not Exist');
// }

$sql="UPDATE coupons SET coupon_name='$name', coupon_code='$code', coupon_content='$content', coupon_expiry_date ='$date', coupon_discount = '$discount' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "The coupon name has been edited!";
} else {
    echo "Error " . $conn->error;
}

$conn->close();
header("location: ../goral_bike_layout/goral_biker_coupons.php");
?>