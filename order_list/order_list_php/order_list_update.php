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







$sql = "UPDATE `order_list` SET `order_address`='$order_address',`order_status` = '$order_status',`remark`='$remark',`payment_method_id`='$payment_method_id',`coupon_id`='$coupon_id' WHERE `order_list`.`order_id` = '$order_id'";



if ($conn->query($sql) === TRUE) {

    $conn->close();

    echo "<script>alert('訂單修改成功');location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
