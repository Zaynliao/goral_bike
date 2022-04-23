<?php

require_once("../../db-connect.php");

if (!isset($_GET['product_id'])) {
    echo `<script>alert("請選取欲修改商品")</script>`;
}

// test
// $typecategory = "";

// switch ($type) {
//     case 0:
//         $typename = "General_product_id";
//         break;
//     case 1:
//         $typename = "General_product_name";
//         break;
//     case 2:
//         $typename = "General_product_images";
//         break;
//     case 3:
//         $typename = "General_product_price";
//         break;
//     case 4:
//         $typename = "General_product_category_id";
//         break;
// }

// $typename = $_GET[`$typename`];


$product_id = $_GET["product_id"];
$state = 1;

$DATE = date('Y-m-d');

$sql = "UPDATE `product` SET `valid` = '$state' ,`product_update` ='$DATE' WHERE `product`.`product_id` = '$product_id'";

// test
// $sql = "DELETE FROM `general_product` WHERE `general_product`.`$typename` = $typename";

if ($conn->query($sql) === TRUE) {

    $conn->close();
    // echo `<script>alert("刪除一筆資料成功");</script>`;
    // header("location:../goral_bike_layout/goral_biker_off_product.php");
    echo "<script> alert('上架成功');location.href = document.referrer;</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
