<?php

require_once("../../db-connect.php");


$product_id = $_POST["product_id"];
$order_id = $_POST["order_id"];

// echo $product_id . $order_id;


$sql = "DELETE FROM `product_order` WHERE  `product_order`.`product_id` = '$product_id' AND `order_id`='$order_id';";

// test
// $sql = "DELETE FROM `general_product` WHERE `general_product`.`$typename` = $typename";

if ($conn->query($sql) === TRUE) {

    $conn->close();

    echo "<script>alert('訂單商品刪除成功');location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
