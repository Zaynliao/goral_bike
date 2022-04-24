<?php


require_once("../../db-connect.php");

if (!isset($_POST["product_name"])) {
    echo "ERROR 404";
    exit;
}


// // $product_id = $_GET['product_id'];

// // $product_category_id = 1;
$product_name = $_POST['product_name'];
$product_images = $_FILES["product_images"]["name"];
$product_price = $_POST['product_price'];
$product_category_id = $_POST['product_category_id'];
$product_update =  $_POST['product_update'];
$today = date("Y-m-d");
if (empty($product_name) || empty($product_images) || empty($product_price)) {
    echo "<script>alert('欄位為空');location.href = document.referrer;</script>";
    return;
}

if (empty($product_update)) {
    $product_update = $today;
}


// if ($_FILES["product_images"]["error"] == 0) {

if ($_FILES["product_images"]["error"] == 0) {

    if (file_exists("../product/goral_bike_pic/" . $_FILES["product_images"]["name"])) {
        // echo $_FILES["product_images"]["name"];
        echo "<script>alert(檔案重複');location.href = document.referrer;</script>";
    } else {
        if (move_uploaded_file($_FILES["product_images"]["tmp_name"], "../goral_bike_pic/" . $_FILES["product_images"]["name"])) {

            $sql = "INSERT INTO `product` ( `product_name`, `product_images`, `product_price`, `product_category_id`,`product_update`) VALUES ('$product_name', '$product_images', '$product_price', '$product_category_id','$product_update');";

            if ($conn->query($sql) === TRUE) {

                // echo "上傳成功";

                $conn->close();

                // header("location:../../goral_bike_layout/goral_biker_product.php");

                echo "<script>alert('新增成功');location.href = document.referrer;</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit;
            }
        }
    }
}





// date_default_timezone_set("Asia/Taipei");

// $now = date('Y-m-d H:i:s');