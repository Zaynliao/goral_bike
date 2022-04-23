<?php
require_once("db-connect.php");

$id=$_POST["checkbox"];

if(empty($id)){
    echo "<script>alert('錯誤:未勾選項目')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

foreach($id as $value){
    $sql="DELETE FROM classes WHERE course_id='$value'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('刪除課程完成')</script>";
        echo "<script>self.location=document.referrer;</script>";
        exit;
    } else {
    echo "<script>alert('刪除課程失敗')</script>";
    echo "<script>self.location=document.referrer;</script>";
    exit;
    }
}

$conn->close();


?>