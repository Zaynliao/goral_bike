<?php
require_once("../db-connect.php");

$status_sql = "SELECT * FROM activity_status";
$result_status = $conn->query($status_sql);
$rows_status = $result_status->fetch_all(MYSQLI_ASSOC);

$venue_sql = "SELECT * FROM activity_venue";
$result_venue = $conn->query($venue_sql);
$rows_venue = $result_venue->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Activity Inset</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between my-5">
            <h3>新增活動</h3>
            <a href="../goral_bike_layout/goral_biker_activity-list.php" class="btn btn-outline-dark mx-1">返回活動管理</a>
        </div>
        <form class="row g-2" action="../activity/api/activity-doInsert.php" enctype="multipart/form-data" method="post">
            <div class="col-md-2">
                <label for="" class="form-label">地區</label>
                <select class="form-control" name="category" id="category">
                    <?php foreach ($rows_venue  as $row) : ?>
                        <option value="<?= $row["id"] ?>"><?= $row["activity_venue_name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">活動名稱</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">活動日期</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">報名人數</label>
                <input type="text" class="form-control" name="persons" id="persons">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">出發地點</label>
                <input type="text" class="form-control" name="location" id="location">
            </div>
            <div class="col-3">
                <label for="" class="form-label">報名開始日期</label>
                <input type="date" class="form-control" name="date_start" id="date_start">
            </div>
            <div class="col-3">
                <label for="" class="form-label">報名結束日期</label>
                <input type="date" class="form-control" name="date_end" id="date_end">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">報名狀態</label>
                <select class="form-control" name="status" id="status">
                    <?php foreach ($rows_status  as $row) : ?>
                        <option value="<?= $row["id"] ?>"><?= $row["activity_status_name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-2">
                <label for="" class="form-label">報名費用</label>
                <input type="text" class="form-control" name="fee" id="fee">
            </div>
            <div class="col-md-8">
                <label for="" class="form-label">活動內容</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="col-4">
                <label for="" class="form-label">活動圖片</label>
                <div class="img-thumbnail text-center">
                    <img src="../../goral_bike_First/course/icon/no-image.png" class="img-fluid" id="img-view">
                </div>
                <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png, .webp, .svg">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">送出</button>
            </div>
        </form>
    </div>







    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $("#image").change(function() {

            readURL(this);

        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                console.log(input.files[0]);
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