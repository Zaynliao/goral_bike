<?php
$servername = "localhost";
$username = "admin";
$password = "123456";
$dbname = "goral_biker";

$conn = new mysqli($servername, $username, $password, $dbname);
// 檢查連線
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
} else {
    // echo "連線成功";
}

session_start();

// $path = $_SERVER["REQUEST_URI"];

// echo $path . "<br>";
// // 透過路徑取得檔名
// $file = basename($path);
// echo $file;
