<?php

require_once("../../db-connect.php");

if (!isset($_GET['order_id'])) {
    echo `<script>alert("請選取欲修改商品")</script>`;
}

$order_id = $_GET['order_id'];


$sql = "DELETE FROM `order_list` WHERE `order_list`.`order_id` = '$order_id';";

if ($conn->query($sql) === TRUE) {

    $conn->close();

    // header("location:../goral_bike_layout/goral_biker_order_list.php");
    echo "<script> location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}