<?php
//Make a sorting thing
require_once("../db-connect.php");
if((!isset($_GET["id"])) || (!isset($_GET["name"]))){
    header("location: 404.php");
}
$id = $_GET["id"];
$name = $_GET["name"];
$name2 = $_GET["name2"];
if(empty($name)){
    exit("one or more boxes are empty");
}

if($name == $name2){
    exit("you did not edit anything");
}

// $select = mysqli_query($conn, "SELECT * FROM payment_method WHERE name = '".$_GET["name"]."'");
// if(mysqli_num_rows($select) == 0) {
//     exit('This Method Does Not Exist');
// }

$sql="UPDATE product_category SET product_category_name='$name' WHERE product_category_id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "The coupon name has been edited!";
} else {
    echo "Error " . $conn->error;
}

$conn->close();
header("location: ../goral_bike_layout/goral_biker_product_category.php");
?>