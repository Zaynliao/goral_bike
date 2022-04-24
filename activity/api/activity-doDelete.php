<?php
require("../../db-connect.php");

if (!isset($_GET['id'])) {
    echo "id = null";
    exit;
}

if (isset($_GET["id"])) {
    $activity_id = $_GET["id"];
}

$activity_id = $_GET["id"];

$sql = "DELETE FROM activity WHERE activity.id = '$activity_id'";

if ($conn->query($sql) === TRUE) {

    $conn->close();

    echo "<script>alert('活動刪除成功');location.href = document.referrer;</script>";

} else {
    echo "Error: " . $sql . "<br>" .$conn->error;
    exit;
}

?>