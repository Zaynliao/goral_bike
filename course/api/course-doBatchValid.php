<?php
require("db-connect.php");

$id=$_POST["checkbox"];



foreach($id as $value){
    $sql="UPDATE classes SET course_valid=1 WHERE course_id=$value";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('上架課程完成')</script>";
        echo "<script>self.location=document.referrer;</script>";
        exit;
    } else {
    echo "<script>alert('上架課程失敗')</script>";
    echo "<script>self.location=document.referrer;</script>";
    exit;
    }
}

$conn->close();


?>