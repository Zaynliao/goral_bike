<?php
require("../db-connect.php");

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




// $dateNew=strtotime($date);
// $dateEnd=strtotime($end_time);


if(empty($category)||empty($fileName)||empty($name)||empty($date)||empty($location)||empty($persons)||empty($date_start)||empty($date_end)||empty($status)||empty($fee)||empty($content)){
    echo "<script>alert('錯誤:存在未填寫欄位')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

// if($end_time < $start_time|| $dateNew < $dateEnd){
//     echo "<script>alert('錯誤：課程/報名時間順序')</script>";
//     echo "<script>history.go(-1)</script> ";
//     return;
//     }


$sql="INSERT INTO activity (activity_venue_id, activity_pictures, activity_name, activity_date, activity_location, activity_persons, activity_start_date, activity_end_date, activity_status_id, activity_fee, activity_content, activity_valid) VALUES ('$category', '$fileName', '$name', '$date', '$location', '$persons', '$date_start', '$date_end', '$status', '$fee', '$content',1)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('新增活動完成')</script>";
    echo "<script>location.href='../../goral_bike_layout/goral_biker_course-list.php?type=2'</script> ";
    exit;

} else {
    echo "<script>alert('新增活動錯誤')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

$conn->close();


?>