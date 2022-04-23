<?php
require("../../db-connect.php");

$id=$_POST["id"];


$sql="UPDATE activity SET activity_valid=1 WHERE activity_valid='$id'";

if ($conn->query($sql) === TRUE) {

    $data=[
        "status"=>1,
        "message"=>"上架課程成功"
    ];
    echo json_encode($data);

} else {

    $data=[
        "status"=>0,
        "message"=>"上架課程失敗: " . $conn->error
    ];
    echo json_encode($data);

    exit;
}

$conn->close();


?>