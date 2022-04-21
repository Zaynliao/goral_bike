<?php
require_once("db-connect.php");


$id=$_GET['id'];
$idLoca=$_GET['loca'];
$idStatu=$_GET['statu'];
$idCate=$_GET['cate'];

$sql="SELECT * FROM classes WHERE course_id=$id";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sqlLoca = "SELECT * FROM course_location";
$resultLoca = $conn->query($sqlLoca);
$rowsLoca = $resultLoca->fetch_all(MYSQLI_ASSOC);

$sqlStatu = "SELECT * FROM course_status";
$resultStatu = $conn->query($sqlStatu);
$rowsStatu = $resultStatu->fetch_all(MYSQLI_ASSOC);

$sqlCate = "SELECT * FROM course_category";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Upload Course</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="pt-4 pb-2 text-end">
                    <a class="btn btn-info text-white position-relative" href="../goral_bike_layout/goral_biker_course-list.php">返回課程管理</a>
                </div>
                <h1>修改課程</h1>
                <form action="../course/api/course-doUpload.php" enctype="multipart/form-data" method="post">
                    <div class="mb-2">
                        <label for="">課程編號 : <?=$rows["course_id"]?></label>
                        <input class="form-control" type="hidden" name="id" id="id" value="<?=$rows["course_id"]?>">
                    </div>
                    <div class="mb-2">
                        <label for="">上架狀態</label>
                        <select class="form-control" name="valid" id="valid">
                            <option value="1" <?php if($rows["course_valid"]==1): echo "selected"?><?php endif;?>>上架
                            </option>
                            <option value="2" <?php if($rows["course_valid"]==0): echo "selected"?><?php endif;?>>下架
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">課程類別</label>
                        <select class="form-control" name="category" id="category">
                            <?php foreach($rowsCate as $row): ?>
                            <option value="<?=$row["course_category_id"]?>"
                                <?php if($row["course_category_id"]==$idCate):  echo "selected"?> <?php else:?>
                                <?php endif;?>>
                                <?=$row["course_category_name"]?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">課程名稱</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="<?=$rows["course_title"]?>">
                    </div>
                    <div class="mb-2">課程圖片
                        <input type="file" class="form-control" name="image" id="image"
                            accept=".jpg, .jpeg, .png, .webp, .svg">
                        <img src="../../goral_bike_First/course/images/<?=$rows["course_pictures"]?>" class="img-thumbnail" id="img-view">
                    </div>
                    <div class="mb-2">
                        <label for="">課程時間</label>
                        <input class="form-control" type="date" name="date" id="date" value="<?=$rows["course_date"]?>">
                    </div>
                    <div class="mb-2">
                        <label for="">課程地點</label>
                        <select class="form-control" name="location" id="location">
                            <?php foreach($rowsLoca as $row): ?>
                            <option value="<?=$row["course_location_id"]?>"
                                <?php if($row["course_location_id"]==$idStatu):  echo "selected"?> <?php else:?>
                                <?php endif;?>>
                                <?=$row["course_location_name"]?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">課程人數</label>
                        <input class="form-control" type="number" name="enrollment" id="enrollment"
                            value="<?=$rows["course_enrollment"]?>">
                    </div>
                    <div class="mb-2">
                        <label for="">報名剩餘名額</label>
                        <input class="form-control" type="number" name="inventory" id="inventory"
                            value="<?=$rows["course_inventory"]?>">
                    </div>
                    <div class="mb-2">
                        <label for="">課程報名開始時間</label>
                        <input class="form-control" type="datetime-local" name="start_time" id="start_time"
                            value="<?=$rows["course_start_time"]?>">
                    </div>
                    <div class="mb-2">
                        <label for="">課程報名結束時間</label>
                        <input class="form-control" type="datetime-local" name="end_time" id="end_time"
                            value="<?=$rows["course_end_time"]?>">
                    </div>
                    <div class="mb-2">
                        <label for="">課程報名狀態</label>
                        <select class="form-control" name="statu" id="statu">
                            <?php foreach($rowsStatu as $row): ?>
                            <option value="<?=$row["course_status_id"]?>"
                                <?php if($row["course_status_id"]==$idStatu):  echo "selected"?> <?php else:?>
                                <?php endif;?>>
                                <?=$row["course_status_name"]?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">課程費用</label>
                        <input class="form-control" type="number" name="price" id="price"
                            value="<?=$rows["course_price"]?>">
                    </div>
                    <div class="mb-2">
                        <label for="">課程內容</label>
                        <textarea class="form-control" name="content" id="content" cols="30"
                            rows="10"><?=$rows["course_content"]?></textarea>
                    </div>
                    <button id="send" class="btn btn-info text-white mb-2" type="submit">修改送出</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>

    $("#image").change(function() {

        readURL(this);

    });

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $("#img-view").attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }
    </script>
</body>

</html>