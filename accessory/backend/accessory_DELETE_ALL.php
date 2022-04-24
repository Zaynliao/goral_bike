<?php

require_once("../../db-connect.php");

if (!isset($_GET['accessory_id'])) {
    echo `<script>alert("請選取欲刪除商品")</script>`;
    echo "<script> location.href = document.referrer;</script>";
    exit;
}

$id = $_GET["accessory_id"];

$sql = "DELETE FROM accessory WHERE accessory.id = '$id'";


if ($conn->query($sql) === TRUE) {

    $conn->close();
    echo `<script>alert("刪除一筆資料成功");</script>`;
    header("location:../../goral_bike_layout/goral_biker_off_accessory.php");
    // echo "<script> history.go(-1); location.reload();</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}
