<?php
require("db-connect.php");

$id=$_POST["checkbox"];



foreach($id as $value){
    $sql="DELETE classes WHERE course_id='$value";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('刪除課程完成')</script>";
        echo "<script>self.location=document.referrer;</script>";

    } else {
    echo "<script>alert('刪除課程失敗')</script>";
    echo "<script>self.location=document.referrer;</script>";

    }
}

$conn->close();


?>