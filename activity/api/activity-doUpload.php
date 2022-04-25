<?php
require("../../db-connect.php");

$id=$_POST["id"];
$category=$_POST["category"];
$name=$_POST["name"];
$date=$_POST["date"];
$persons=$_POST["persons"];
$location=$_POST["location"];
$date_start=$_POST["date_start"];
$date_end=$_POST["date_end"];
$status=$_POST["status"];
$fee=$_POST["fee"];
$content=$_POST["content"];
$fileName=$_FILES["image"]["name"];


$dateNow=strtotime($date);
$dateEnd=strtotime($date_end);
$dateStart=strtotime($date_start);


if(empty($category)||empty($name)||empty($date)||empty($persons)||empty($location)||empty($date_start)||empty($date_end)||empty($status)||empty($fee)||empty($content)){ 
    echo "<script>alert('錯誤:存在未填寫欄位') </script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

if(empty($fileName)){
    $imageIs="";
}else{
    $imageIs="activity_pictures='$fileName',";
}


if($date_start < $date_start ){
    echo "<script>alert('錯誤：報名開始日期不可大於報名結束日期')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
    }

if($dateNow < $dateStart || $dateNow < $dateEnd){
    echo "<script>alert('錯誤：報名開始/結束日期不可大於活動日期')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
    }

//     if(empty($fileName)){
//         $imageIs="";
//     }else{
//         $imageIs="course_pictures='$fileName',";
//     }

    
    $sql="UPDATE activity SET 
    activity_venue_id='$category',
    activity_name='$name',
    $imageIs
    activity_date='$date',
    activity_location='$location',
    activity_start_date='$date_start',
    activity_end_date='$date_end',
    activity_status_id='$status',
    activity_fee='$fee',
    activity_content='$content'
    WHERE id='$id'";



if ($conn->query($sql) === TRUE) {
    echo "<script>alert('編輯活動完成')</script>";
    echo "<script>location.href='../../goral_bike_layout/goral_biker_activity-list.php'</script>";
    exit;

} else {
    echo "<script>alert('編輯活動失敗')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

$conn->close();
