<?php

require_once("../../db-connect.php");
if (!isset($_GET['product_id'])) {
    echo "product_id = null";
}


$product_id = $_GET["product_id"];
$state = 0;

$sql = "UPDATE `product` SET `valid` = '$state' WHERE `product`.`product_id` = '$product_id'";

// test
// $sql = "DELETE FROM `general_product` WHERE `general_product`.`$typename` = $typename";

if ($conn->query($sql) === TRUE) {

    $conn->close();
    // echo `<script>alert("刪除一筆資料成功");</script>`;
    header("location:../goral_bike_layout/goral_biker_product.php");
    // echo "<script> alert('修改成功');history.go(-2); </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
