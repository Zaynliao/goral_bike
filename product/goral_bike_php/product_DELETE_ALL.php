<?php

require_once("../../db-connect.php");

if (!isset($_GET['product_id'])) {
    echo `<script>alert("請選取欲修改商品")</script>`;
}

$product_id = $_GET["product_id"];

$sql = "DELETE FROM `product` WHERE `product`.`product_id` = '$product_id'";


if ($conn->query($sql) === TRUE) {

    $conn->close();
    // echo `<script>alert("刪除一筆資料成功");</script>`;
    header("location:../../goral_bike_layout/goral_biker_off_product.php");
    // echo "<script> history.go(-1); location.reload();</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
