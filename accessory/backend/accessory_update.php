<!-- DONE -->
<?php

require_once("../../db-connect.php");

if (!isset($_POST['id'])) {
    echo `<script>alert("請選取欲修改配件")</script>`;
    echo "<script> location.href = document.referrer;</script>";
    exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
// $product_images = $_FILES["product_images"]["name"];
$price = $_POST['price'];
$accessory_category = $_POST['accessory_category'];
$up_date = $_POST['up_date'];

if (empty($name) || empty($price) || empty($accessory_category) || empty($up_date)) {
    echo "EMPTY ERROR";
    return;
}



$sql = "UPDATE `accessory` 
        SET `accessory_name` = '$name ', 
        `accessory_price` = '$price', 
        `accessory_category` = '$accessory_category',
        `accessory_up_date` ='$up_date' 
        WHERE `accessory`.`id` = '$id';
        ";

if ($conn->query($sql) === TRUE) {

    $conn->close();
    echo "修改一筆資料成功,一秒後跳轉配件列表";
    header("Refresh:1;url=../../goral_bike_layout/goral_biker_accessory.php");
    // echo "<script> history.go(-2);</script>";
    // echo "<script> location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
