<?php

require_once("../../db-connect.php");
if (!isset($_POST['order_id'])) {
    echo "order_id = null";
}


$order_address = $_POST["order_address"];


$order_id = $_POST["order_id"];


$order_status = $_POST["order_status"];


$payment_method_id = $_POST["payment_method_id"];


$coupon_id = $_POST["coupon_id"];


$remark = $_POST["remark"];

$total_amount = $_POST["total_final"];


// $order_count = $_POST["order_count"];

// echo $total_amount;


// echo $order_address . $order_id . $order_status . $payment_method_id . $coupon_id . $remark.$total_amount;


$sql = "UPDATE `order_list` SET `order_address`='$order_address',`order_list`.`total_amount`='$total_amount',`order_status` = '$order_status',`remark`='$remark',`payment_method_id`='$payment_method_id',`coupon_id`='$coupon_id' WHERE `order_list`.`order_id` = '$order_id'";


if ($conn->query($sql) === TRUE) {

    $conn->close();

    echo "<script>alert('訂單修改成功');location.href = document.referrer;</script>";
} else {

    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "Error: " . $sql_count . "<br>" . $conn->error;

    exit;
}
