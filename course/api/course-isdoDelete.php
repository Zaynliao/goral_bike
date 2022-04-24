<?php
require_once("../../db-connect.php");

$id=$_POST["id"];

$sql="DELETE classes WHERE course_id='$id'";

if ($conn->query($sql) === TRUE) {

    $data=[
        "status"=>1,
        "message"=>"刪除課程成功"
    ];
    echo json_encode($data);

} else {

    $data=[
        "status"=>0,
        "message"=>"刪除課程失敗: " . $conn->error
    ];
    echo json_encode($data);

    exit;
}

$conn->close();


?>