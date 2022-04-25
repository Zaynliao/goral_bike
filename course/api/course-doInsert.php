<?php
require_once("../../db-connect.php");

$category=$_POST["category"];
$name=$_POST["name"];
$fileName=$_FILES["image"]["name"];
$date=$_POST["date"];
$enrollment=$_POST["enrollment"];
$start_time=$_POST["start_time"];
$end_time=$_POST["end_time"];
$price=$_POST["price"];
$content=$_POST["content"];


$dateNew=strtotime($date);
$dateEnd=strtotime($end_time);
$dateStart=strtotime($start_time);
$today=time();

if(empty($category)||empty($name)||empty($fileName)||empty($date)||empty($enrollment)||empty($start_time)||empty($end_time)||empty($price)||empty($content)){
    echo "<script>alert('錯誤:存在未填寫欄位')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

if($end_time < $start_time|| $dateNew < $dateEnd){
    echo "<script>alert('錯誤：課程/報名時間順序')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
    }

if($dateStart > $today){
    $statu=1;
}elseif($dateEnd > $today){
    $statu=2;
}elseif($dateEnd < $today){
    $statu=3;
}


$sql="INSERT INTO classes (course_category_id, course_title, course_pictures, course_date, course_enrollment, course_start_time, course_end_time, course_status_id, course_price, course_content, course_inventory, course_valid) VALUES ('$category', '$name', '$fileName', '$date', '$enrollment', '$start_time', '$end_time', '$statu', '$price', '$content', '$enrollment', 1)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('新增課程完成')</script>";
    echo "<script>location.href='../../goral_bike_layout/goral_biker_course-list.php?valid=1'</script> ";
    exit;

} else {
    echo "<script>alert('新增課程錯誤')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

$conn->close();


?>