<?php
require_once("../db-connect.php");

if(!isset($_GET["id"])){
    header("location: ../404.php");
}

$id=$_GET["id"];
// echo $id;


// DELETE
// $sql="DELETE FROM users WHERE id='$id'";

//SOFT DELETE
$sql="UPDATE user SET enable = 0 where id ='$id'";

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
    header("location: ../../goral_bike_layout/goral_biker_user_list.php");
} else {
    echo "刪除資料錯誤: " . $conn->error;
}

$conn->close();



?>