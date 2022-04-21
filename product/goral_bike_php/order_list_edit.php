<?php

require_once("../../db-connect.php");

if (!isset($_POST['order_id'])) {
    echo `<script>alert("請選取欲修改商品")</script>`;
}
$order_id = $_POST['order_id'];
$order_address = $_POST['order_address'];
$total_amount = $_POST['total_amount'];
// $product_images = $_FILES["product_images"]["name"];
$order_status = $_POST['order_status'];
$remark = $_POST['remark'];

$now = date('Y-m-d H:i:s');

if (empty($order_address) || empty($total_amount) || empty($order_status) || empty($remark)) {
    echo "EMPTY ERROR";
    return;
}




$sql = "UPDATE `order_list` SET `order_address` = '$order_address ', `total_amount` = '$total_amount',`order_create_time` = '$now', `order_status` = '$order_status', `remark` = '$remark' WHERE `order_list`.`order_id` = '$order_id';";

if ($conn->query($sql) === TRUE) {

    $conn->close();

    // header("location:../goral_bike_layout/goral_biker_order_list.php");
    echo "<script> location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
