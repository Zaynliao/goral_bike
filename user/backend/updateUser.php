<?php

require_once("../db-connect.php");
if(!isset($_POST["id"])){
    echo "您不是透過正常管道到此頁<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_list.php");
    exit;
}

$id=$_POST["id"];
$name=$_POST["name"];
$account=$_POST["account"];
$gender=$_POST["gender"];
$birthday=$_POST["birthday"];
$address=$_POST["address"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$enable=$_POST["enable"];
$today=date('Y-m-d');

if(empty($name) || empty($account) || empty($birthday)|| empty($address)|| empty($email)|| empty($phone)){
    echo "您有欄位沒有填寫<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_edit.php?id=".$id);
    exit;
}

if(strlen($account)<5 || strlen($account)>10){
    echo "您的帳號長度只能5至10個字元<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_edit.php?id=".$id);
    exit;
}

$accountPattern="/^\w+$/";
if(!preg_match($accountPattern,$account)){
    echo "您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_edit.php?id=".$id);
    exit;
}

if(strtotime($birthday)>strtotime($today)){
    echo "生日日期不可小於今天日期<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_edit.php?id=".$id);
    exit;
}

$pattern="/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/";

if(!preg_match($pattern,$email)){
    echo "信箱格式有誤<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_edit.php?id=".$id);
    exit;
}

$sql="SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows>1){
    echo "信箱已使用過<br>3秒後將自動跳轉頁面<br>";
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user_edit.php?id=".$id);
    exit;
}


// echo $name;


$sql = "UPDATE user SET name='$name', account='$account', gender='$gender',birthday='$birthday', address='$address', email='$email', phone_number='$phone', enable='$enable' WHERE id='$id'";

// echo $sql;
// exit;

if ($conn->query($sql) === TRUE) {
    echo "會員資料更新成功<br>3秒後將自動跳轉頁面<br>";
    $conn->close();
    header("refresh:3;url=../../goral_bike_layout/goral_biker_user.php?id=".$id);
} else {
    echo "更新會員資料錯誤: " . $conn->error;
    exit;
}



?>
