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



// $dateNew=strtotime($date);
// $dateEnd=strtotime($end_time);

if(empty($category)||empty($name)||empty($date)||empty($persons)||empty($location)||empty($date_start)||empty($date_end)||empty($status)||empty($fee)||empty($content)){ 
    echo "<script>alert('錯誤:存在未填寫欄位e') </script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

if(empty($fileName)){
    $imageIs="";
}else{
    $imageIs="activity_pictures='$fileName',";
}


// if($end_time < $start_time|| $dateNew < $dateEnd){
//     echo "<script>alert('錯誤：課程/報名時間順序')</script>";
//     echo "<script>history.go(-1)</script> ";
//     exit;
//     }

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
    echo "<script>location.href='../layout/activity-list.php'</script>";
    exit;

} else {
    echo "<script>alert('編輯活動錯誤')</script>";
    echo "<script>history.go(-1)</script> ";
    exit;
}

$conn->close();

?>