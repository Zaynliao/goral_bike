<?php

// $path = $_SERVER["REQUEST_URI"];
// echo $path . "<br>";
// // 透過路徑取得檔名
// $file = basename($path);
// echo $file;

require_once("db-connect.php");

$sql = "SELECT * FROM course_location";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

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
    <title>Add Course</title>
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
            <div>

                <h1 class="fw-bold mt-4">新增課程</h1>
                <form action="../course/api/course-doInsert.php" enctype="multipart/form-data" method="post">
                    <div class="mb-2">
                        <label for="category">課程類別</label>
                        <select class="form-control" name="category" id="category">
                            <?php foreach ($rowsCate as $row) : ?>
                            <option value="<?= $row["course_category_id"] ?>"><?= $row["course_category_name"] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="name">課程名稱</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="mb-2">
                        <label for="image">課程圖片</label>
                        <input type="file" class="form-control" name="image" id="image"
                            accept=".jpg, .jpeg, .png, .webp, .svg">
                        <div class="img-thumbnail text-center"> <img
                                src="../../goral_bike_First/course/icon/no-image.png" class=" img-fluid" id="img-view">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="date">課程時間</label>
                        <input class="form-control" type="date" name="date" id="date">
                    </div>
                    <div class="mb-2">
                        <label for="location">課程地點</label>
                        <select class="form-control" name="location" id="location">
                            <?php foreach ($rows as $row) : ?>
                            <option value="<?= $row["course_location_id"] ?>"><?= $row["course_location_name"] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="enrollment">課程人數</label>
                        <input class="form-control" type="number" name="enrollment" id="enrollment">
                    </div>
                    <div class="mb-2">
                        <label for="start_time">課程報名開始時間</label>
                        <input class="form-control" type="datetime-local" name="start_time" id="start_time">
                    </div>
                    <div class="mb-2">
                        <label for="end_time">課程報名結束時間</label>
                        <input class="form-control" type="datetime-local" name="end_time" id="end_time">
                    </div>
                    <div class="mb-2">
                        <label for="statu">課程報名狀態</label>
                        <select class="form-control" name="statu" id="statu">
                            <?php foreach ($rowsStatu as $row) : ?>
                            <option value="<?= $rowStatu["course_status_id"] ?>"><?= $row["course_status_name"] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="price">課程費用</label>
                        <input class="form-control" type="number" name="price" id="price">
                    </div>
                    <div class="mb-2">
                        <label for="content">課程內容</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                    </div>
                    <button class="btn btn-secondary text-white mb-2 me-2 fw-bold" type="reset" value="清除表單">清除</button>
                    <button id="send" class="btn btn-dark text-white mb-2 fw-bold" type="submit">送出</button>
                    <div class="text-end pb-4">
                    <a class="btn btn-dark text-white position-relative fw-bold"
                        href="../goral_bike_layout/goral_biker_course-list.php">返回課程管理</a>
                </div>
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