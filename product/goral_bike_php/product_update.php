<?php

require_once("../../db-connect.php");

if (!isset($_POST['product_id'])) {
    echo `<script>alert("請選取欲修改商品")</script>`;
}

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];

$product_price = $_POST['product_price'];
$product_category_id = $_POST['product_category_id'];
$product_update = $_POST['product_update'];
$product_old_images = $_POST['product_old_images'];


if (empty($product_name) || empty($product_price) || empty($product_category_id)) {
    echo "<script> alert('欄位為空'); </script>";
    return;
}

if (file_exists("../goral_bike_pic/" . $_FILES["product_images"]["name"])) {
    // echo $_FILES["product_images"]["name"];
    // echo "檔案已存在";
    if ($_FILES['product_images']['error'] == 0){
    $product_images = $_FILES["product_images"]["name"];
    } else {
    // echo $_FILES['product_images']['error'];
    #如果沒有選擇圖片就使用原本資料庫的圖片
    $product_images=$product_old_images;
     }
    
} else {
    if ($_FILES['product_images']['error'] == 0){
        #如果有選擇圖片就使用新上傳的圖片
        $product_images = $_FILES["product_images"]["name"];
        #上傳圖片
        if(move_uploaded_file($_FILES['product_images']['tmp_name'], '../goral_bike_pic/'.$filename)){
            echo "success";
        }else{
            echo "fail";
        }
      } else {
        // echo $_FILES['product_images']['error'];
        #如果沒有選擇圖片就使用原本資料庫的圖片
        $product_images=$product_old_images;
      }
}

$sql = "UPDATE `product` SET `product_name` = '$product_name ',`product_images` = '$product_images ', `product_price` = '$product_price', `product_category_id` = '$product_category_id',`product_update` ='$product_update' WHERE `product`.`product_id` = '$product_id';";

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