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

if (empty($product_name) || empty($product_price) || empty($product_category_id)) {
    echo "EMPTY ERROR";
    return;
}




$sql = "UPDATE `product` SET `product_name` = '$product_name ', `product_price` = '$product_price', `product_category_id` = '$product_category_id' WHERE `product`.`product_id` = '$product_id';";

if ($conn->query($sql) === TRUE) {

    $conn->close();

    header("location:../goral_bike_layout/goral_biker_product.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
