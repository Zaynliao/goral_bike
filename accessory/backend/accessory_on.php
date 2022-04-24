<!-- DONE -->
<?php

require_once("../../db-connect.php");

if (!isset($_GET["accessory_id"])) {
    echo `<script>alert("請選取欲上架配件")</script>`;
    echo "<script> location.href = document.referrer;</script>";
    exit;
}

$id = $_GET["accessory_id"];
$state = 1;

$sql = "UPDATE `accessory` SET `accessory_valid` = '$state' WHERE accessory.id = '$id'";

// test
// $sql = "DELETE FROM `general_product` WHERE `general_product`.`$typename` = $typename";

if ($conn->query($sql) === TRUE) {

    $conn->close();
    // echo `<script>alert("刪除一筆資料成功");</script>`;
    // header("location:../goral_bike_layout/goral_biker_off_product.php");
    echo "<script>alert('上架成功')</script>";
    header("location:../../goral_bike_layout/goral_biker_accessory.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}

?>