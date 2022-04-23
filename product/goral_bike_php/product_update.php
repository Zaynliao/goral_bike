<?php

require_once("../../db-connect.php");

if (!isset($_POST['product_id'])) {
    echo `<script>alert("請選取欲修改商品")</script>`;
}

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
// $product_images = $_FILES["product_images"]["name"];
$product_price = $_POST['product_price'];
$product_category_id = $_POST['product_category_id'];
$product_update = $_POST['product_update'];



if (empty($product_name) || empty($product_price) || empty($product_category_id)) {
    echo "EMPTY ERROR";
    return;
}




$sql = "UPDATE `product` SET `product_name` = '$product_name ', `product_price` = '$product_price', `product_category_id` = '$product_category_id',`product_update` ='$product_update' WHERE `product`.`product_id` = '$product_id';";

if ($conn->query($sql) === TRUE) {

    $conn->close();
    echo "<script> alert('修改一筆資料成功'); </script>";
    // header("location:../../goral_bike_layout/goral_biker_product.php");
    // echo header("location:../../goral_bike_layout/goral_biker_product.php");
    echo "<script> location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}