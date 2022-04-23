<?php
require_once("../../db-connect.php");

$id = $_GET['id'];
$idStatus = $_GET['status'];
$idVenue = $_GET['venue'];

$sql = "SELECT * FROM activity WHERE id=$id";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sqlStatus = "SELECT * FROM activity_status";
$resultStatus = $conn->query($sqlStatus);
$rowsStatus = $resultStatus->fetch_all(MYSQLI_ASSOC);

$sqlVenue = "SELECT * FROM activity_venue";
$resultVenue = $conn->query($sqlVenue);
$rowsVenue = $resultVenue->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Upload Activity</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- ================= CSS ================= -->
    <style>
        a {
            color: #fff;
            font-size: 1.3rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between my-5">
            <h3>修改活動內容</h3>
            <a href="activity-list.php" class="btn btn-outline-dark mx-1">返回活動管理</a>
        </div>
        <form class="row g-2" action="../api/activity-doUpload.php" enctype="multipart/form-data" method="post">
            <div class="col-md-2">
                <label for="" class="form-label">地區</label>
                <select class="form-control" name="category" id="category">
                    <?php foreach ($rowsVenue as $row) : ?>
                        <option value="<?= $row["id"] ?>" <?php if ($row["id"] == $idVenue) : echo "selected" ?> <?php else : ?> <?php endif; ?>>
                            <?= $row["activity_venue_name"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-md-6">
                <input value="<?= $rows["id"]?>" type="text" name="id" hidden>
                <label for="" class="form-label">活動名稱</label>
                <input value="<?= $rows["activity_name"]?>" type="text" class="form-control" name="name" id="name">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">活動日期</label>
                <input value="<?= $rows["activity_date"]?>" type="date" class="form-control" name="date" id="date">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">報名人數</label>
                <input value="<?= $rows["activity_persons"]?>" type="text" class="form-control" name="persons" id="persons">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">出發地點</label>
                <input value="<?= $rows["activity_location"]?>" type="text" class="form-control" name="location" id="location">
            </div>
            <div class="col-3">
                <label for="" class="form-label">報名開始日期</label>
                <input value="<?= $rows["activity_start_date"]?>" type="date" class="form-control" name="date_start" id="date_start">
            </div>
            <div class="col-3">
                <label for="" class="form-label">報名結束日期</label>
                <input value="<?= $rows["activity_end_date"]?>"  type="date" class="form-control" name="date_end" id="date_end">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">報名狀態</label>
                <select class="form-control" name="status" id="status">
                    <?php foreach ($rowsStatus as $row) : ?>
                        <option value="<?= $row["id"] ?>" <?php if ($row["id"] == $idStatus) : echo "selected" ?> <?php else : ?> <?php endif; ?>>
                            <?= $row["activity_status_name"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-2">
                <label for="" class="form-label">報名費用</label>
                <input value="<?= $rows["activity_fee"]?>" type="text" class="form-control" name="fee" id="fee">
            </div>
            <div class="col-md-8">
                <label for="" class="form-label">活動內容</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?= $rows["activity_content"]?></textarea>
            </div>
            <div class="col-4">
                <label for="" class="form-label">活動圖片</label>
                <div class="img-thumbnail text-center">
                    <img src="../images/<?= $rows["activity_pictures"]?>" class="img-fluid" id="img-view">
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