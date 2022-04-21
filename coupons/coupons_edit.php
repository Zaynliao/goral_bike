<?php
//Make a sorting thing
require_once("db-connect.php");
if(!isset($_GET["id"])){
    // header("location: 404.php");
}
$id = $_GET["id"];
$name = $_GET["name"];
$code = $_GET["code"];
$content = $_GET["content"];
$date = $_GET["date"];
$today = date("Y-m-d");

if(empty($name) || empty($code) || empty($content) || empty($date)){
    exit("one or more boxes are empty");
}

if($date < $today){
    exit("the expiry date cannot be before today");
}


// $select = mysqli_query($conn, "SELECT * FROM coupons WHERE name = '".$_GET["name"]."'");
// if(mysqli_num_rows($select) == 0) {
//     exit('This Method Does Not Exist');
// }

$sql="UPDATE coupons SET coupon_name='$name', coupon_code='$code', coupon_content='$content', coupon_expiry_date ='$date' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "The coupon name has been edited!";
} else {
    echo "Error " . $conn->error;
}

$conn->close();
header("location: ../goral_bike_layout/goral_biker_coupons.php");
?>