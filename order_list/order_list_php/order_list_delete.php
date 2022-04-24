<?php

require_once("../../db-connect.php");
if (!isset($_GET['order_id'])) {
    echo "order_id = null";
}

if (isset($_GET["order_id"])) {
    $order_id = $_GET["order_id"];
}




$state = 0;

$sql = "UPDATE `product` SET `valid` = '$state' WHERE  `product_order`.`order_id`='$order_id'";

// test
// $sql = "DELETE FROM `general_product` WHERE `general_product`.`$typename` = $typename";

if ($conn->query($sql) === TRUE) {

    $conn->close();

    echo "<script>alert('訂單商品刪除成功');location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
