<?php
require_once("../db-connect.php");

if(!isset($_POST["name"])){
    echo "您不是透過正常管道到此頁<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

$name=$_POST["name"];
$account=$_POST["account"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$today=date('Y-m-d');
$address=$_POST["address"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$now=date('Y-m-d H:i:s');

if(empty($name) || empty($account) || empty($password)|| empty($gender)|| empty($birthday)|| empty($address)|| empty($email)|| empty($phone)){
    echo "您有欄位沒有填寫<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

if(strlen($account)<5 || strlen($account)>10){
    echo "您的帳號長度只能5至10個字元<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

$accountPattern="/^\w+$/";
if(!preg_match($accountPattern,$account)){
    echo "您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

if($password != $repassword){
    echo "密碼不一致<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

if(strtotime($birthday)>strtotime($today)){
    echo "生日日期不可小於今天日期<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

$pattern="/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/";

if(!preg_match($pattern,$email)){
    echo "信箱格式有誤<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

$sql="SELECT * FROM user WHERE account='$account'";
$result = $conn->query($sql);
if($result->num_rows>0){
    echo "帳號已存在<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

$sql="SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows>0){
    echo "信箱已使用過<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_register.php");
    exit;
}

$password=password_hash($password, PASSWORD_DEFAULT);

$sql="INSERT INTO user (name, account, password, gender, birthday, address, email, phone_number, create_time, enable) 
VALUES ('$name','$account','$password','$gender','$birthday','$address','$email', '$phone', '$now', 1)";

if ($conn->query($sql) === TRUE) {
    echo "新增資料成功<br>";
} else {
    echo "新增資料錯誤". $conn->error;
    exit;
}

$conn->close();
header("refresh:3;url=../../goral_bike_layout/goral_biker_user_list.php");


?>