<!-- DONE -->
<?php


require_once("../../db-connect.php");

if (!isset($_POST["name"])) {
    echo "ERROR 404<br>兩秒後跳轉至配件列表";

    header("Refresh:2;url=../../goral_bike_layout/goral_biker_accessory.php");
}


// // $product_id = $_GET['product_id'];

// // $product_category_id = 1;
$name = $_POST['name'];
$images = $_FILES["images"]["name"];
$price = $_POST['price'];
$category = $_POST['category'];
$specification = $_POST['specification'];
$color = $_POST['color'];
$description = $_POST['description'];
$up_date =  $_POST['up_date'];
$today = date("Y-m-d");

if (empty($name) || empty($images) || empty($price) || empty($specification) || empty($color) || empty($description) || empty($up_date) ) {
    echo "欄位為空";
    echo "<script> location.href = document.referrer;</script>";
    return;
}

// if ($_FILES["product_images"]["error"] == 0) {

if ($_FILES["images"]["error"] == 0) {

    if (file_exists("../accessory/image/$category/".$images)) {
        echo $_FILES["images"]["name"];
        echo "檔案已存在<br>兩秒後跳轉至配件列表";
        header("Refresh:2;url=../../goral_bike_layout/goral_biker_accessory.php");
    } else {
        if (move_uploaded_file($_FILES["images"]["tmp_name"], "../image/$category/".$images)) {

            $sql = "INSERT INTO `accessory` ( `accessory_name`, `accessory_picture`, `accessory_price`, `accessory_specification`, `accessory_description`, `accessory_category`, `accessory_color`, `accessory_up_date`) VALUES ('$name', '$images', '$price', '$specification', '$description', '$category', '$color', '$up_date');";

            if ($conn->query($sql) === TRUE) {

                $conn->close();
                
                // echo "<script> location.href = document.referrer;</script>";
                echo "<script>alert('新增資料成功')</script>";
                header("location:../../goral_bike_layout/goral_biker_accessory.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit;
            }
        }
    }
}

// date_default_timezone_set("Asia/Taipei");

// $now = date('Y-m-d H:i:s');
?>



