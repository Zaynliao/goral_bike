<?php
require("db-connect.php");

$id=$_POST["checkbox"];



foreach($id as $value){
    $sql="UPDATE classes SET course_valid=0 WHERE course_id=$value";
    if ($conn->query($sql) === TRUE) {

        echo "<script>alert('下架課程完成$value')</script>";
        echo "<script>self.location=document.referrer;</script>";

      

    } else {
    echo "<script>alert('下架課程失敗')</script>";
    echo "<script>self.location=document.referrer;</script>";
  
    }
}

$conn->close();


?>