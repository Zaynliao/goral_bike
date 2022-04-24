<?php
require_once("../db-connect.php");

$id=$_POST['id'];
$category=$_POST["category"];
$name=$_POST["name"];
$fileName=$_FILES["image"]["name"];
$date=$_POST["date"];
$enrollment=$_POST["enrollment"];
$inventory=$_POST["inventory"];
$start_time=$_POST["start_time"];
$end_time=$_POST["end_time"];
$statu=$_POST["statu"];
$price=$_POST["price"];
$content=$_POST["content"];
$valid=$_POST["valid"];


$dateNew=strtotime($date);
$dateEnd=strtotime($end_time);

if(empty($name)||empty($date)||empty($enrollment)||empty($start_time)||empty($end_time)||empty($price)||$inventory==null||empty($content)){
    echo "<script>alert('有欄位未填寫')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}


if($end_time < $start_time|| $dateNew < $dateEnd){
    echo "<script>alert('錯誤：課程/報名時間順序')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
    }

    if(empty($fileName)){
        $imageIs="";
    }else{
        $imageIs="course_pictures='$fileName',";
    }

    $sql="UPDATE classes SET 
    course_category_id='$category',
    course_title='$name',
    $imageIs
    course_date='$date',
    course_enrollment='$enrollment',
    course_start_time='$start_time',
    course_end_time='$end_time',
    course_status_id='$statu',
    course_price='$price',
    course_content='$content',
    course_inventory='$inventory',
    course_valid='$valid'
    WHERE course_id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('修改課程完成')</script>";
    echo "<script>location.href='../../goral_bike_layout/goral_biker_course-list.php'</script>";
    exit;

} else {
    echo "<script>alert('修改課程錯誤')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

$conn->close();
?>