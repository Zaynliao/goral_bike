<?php
require("../../db-connect.php");

$category=$_POST["category"];
$fileName=$_FILES["image"]["name"];
$name=$_POST["name"];
$date=$_POST["date"];
$location=$_POST["location"];
$persons=$_POST["persons"];
$date_start=$_POST["date_start"];
$date_end=$_POST["date_end"];
$status=$_POST["status"];
$fee=$_POST["fee"];
$content=$_POST["content"];


$dateNow=strtotime($date);
$dateEnd=strtotime($date_end);
$dateStart=strtotime($date_start);


if(empty($category)||empty($fileName)||empty($name)||empty($date)||empty($location)||empty($persons)||empty($date_start)||empty($date_end)||empty($status)||empty($fee)||empty($content)){
    echo "<script>alert('錯誤:存在未填寫欄位')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

if($dateEnd < $date_start ){
    echo "<script>alert('錯誤：報名開始日期不可大於報名結束日期')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
    }

if($dateNow < $dateStart || $dateNow < $dateEnd){
    echo "<script>alert('錯誤：報名開始/結束日期不可大於活動日期')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
    }


$sql="INSERT INTO activity (activity_venue_id, activity_pictures, activity_name, activity_date, activity_location, activity_persons, activity_start_date, activity_end_date, activity_status_id, activity_fee, activity_content, activity_valid) VALUES ('$category', '$fileName', '$name', '$date', '$location', '$persons', '$date_start', '$date_end', '$status', '$fee', '$content',1)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('新增活動完成')</script>";
    echo "<script>location.href='../../goral_bike_layout/goral_biker_activity-list.php'</script> ";
    exit;

} else {
    echo "<script>alert('新增活動失敗')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

$conn->close();


?>