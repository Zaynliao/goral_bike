<?php

require_once("../../db-connect.php");


$check = $_POST["check"];


if($_POST["check"]==0){
    echo "<script>alert('請勾選欲選擇項目');location.href = document.referrer;</script>";
}


foreach($check as $value){

    $sql="DELETE FROM `product` WHERE `product`.`product_id` = '$value'";
    if ($conn->query($sql) === TRUE) {    
        
        echo "<script>alert('批次移除成功');location.href = document.referrer;</script>";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();
// test
// $sql = "DELETE FROM `general_product` WHERE `general_product`.`$typename` = $typename";