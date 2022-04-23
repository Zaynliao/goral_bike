<?php
require_once("../db-connect.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

$sql = "SELECT * FROM activity WHERE activity_valid=1";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$sqlAct = "SELECT activity.*, activity_status.activity_status_name, activity_venue.activity_venue_name FROM activity
LEFT JOIN activity_status on activity.activity_status_id=activity_status.id
LEFT JOIN activity_venue on activity.activity_venue_id=activity_venue.id
WHERE activity_valid=1";
$resultAct = $conn->query($sqlAct);
$rowsAct = $resultAct->fetch_all(MYSQLI_ASSOC);


/* ================= 分頁 =================  */
$total = $resultAct->num_rows;
// echo $total;
$per_page = 4;
$page_count = ceil($total / $per_page); //總頁數
$start = ($p - 1) * $per_page;
// echo $page_count;

$sqlAct = "SELECT activity.*, activity_status.activity_status_name, activity_venue.activity_venue_name FROM activity
LEFT JOIN activity_status on activity.activity_status_id=activity_status.id
LEFT JOIN activity_venue on activity.activity_venue_id=activity_venue.id
WHERE activity_valid=1
LIMIT $start,$per_page";
$resultAct = $conn->query($sqlAct);
$rowsAct = $resultAct->fetch_all(MYSQLI_ASSOC);



?>


<!doctype html>
<html lang="en">

<head>
    <title>Activity list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- ================= CSS ================= -->
    <style>
        .object-cover {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        p {
            margin: 0px;
        }

        a {
            color: #fff;
            font-size: 1.3rem;
        }

        .activity_cont {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
</head>


<body>
    <div class="container mt-5">
        <!-- ================= nav ================= -->
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="layui-inline d-flex">
                    <label class="layui-form-label">活動時間：</label>
                    <div class="layui-input-inline" style="width: 140px;">
                        <input type="date" name="date_min" placeholder="" autocomplete="off" class="layui-input" value="{$param.date_min|default=''}">
                    </div>
                    <div class="layui-form-mid">-</div>
                    <div class="layui-input-inline" style="width: 140px;">
                        <input type="date" name="date_max" placeholder="" autocomplete="off" class="layui-input" value="{$param.date_max|default=''}">
                    </div>
                    <a href="#" class="btn btn-dark mx-1">送出</a>
                </div>
            </div>
            <!-- ================= 排序 ================= -->
            <div class="mt-2 d-flex">
                <div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>排列方式</option>
                        <option value="1">價錢 $-$$$</option>
                        <option value="2">價錢 $$$-$</option>
                    </select>
                </div>
                <div>
                    <a href="../goral_bike_layout/goral_biker_activity-inset.php" class="btn btn-primary mx-2">新增活動</a>
                </div>
            </div>
        </div>
        <!-- ================= 內容 ================= -->
        <?php foreach ($rowsAct as $row) : ?>
            <div class="card mt-3">
                <div class="row g-0">
                    <div class="col-3 d-flex align-items-center">
                        <img class="object-cover" src="../activity/images/<?= $row["activity_pictures"] ?>" alt="...">
                    </div>
                    <div class="col-6 ">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["activity_name"] ?></h5>
                            <h6 class="card-text">活動日期：<?= $row["activity_date"] ?></h6>
                            <div class="d-flex">
                                <h5 class="card-text">
                                    <span class="badge <?php if ($row["activity_venue_id"] == 1) : echo "bg-danger" ?>
                                    <?php elseif ($row["activity_venue_id"] == 2) : echo "bg-warning" ?>
                                    <?php elseif ($row["activity_venue_id"] == 3) : echo "bg-info" ?>
                                    <?php else : echo "bg-success" ?>
                                    <?php endif; ?> 
                                    rounded-pill px-2 me-1" <?php if (!$row["activity_venue_id"]) : echo "hidden" ?> <?php endif; ?>>
                                        <?= $row["activity_venue_name"] ?></span>
                                </h5>
                                <h5 class="card-text">
                                    <span class="badge <?php if ($row["activity_status_id"] == 1) : echo "bg-secondary" ?>
                                    <?php elseif ($row["activity_status_id"] == 2) : echo "bg-success" ?>
                                    <?php else : echo "bg-warning text-dark" ?>
                                    <?php endif; ?> 
                                    rounded-pill px-2 me-1" <?php if (!$row["activity_status_id"]) : echo "hidden" ?> <?php endif; ?>>
                                        <?= $row["activity_status_name"] ?></span>
                                </h5>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">活動地點：<?= $row["activity_location"] ?></p>
                                <p class="card-text">活動人數：<?= $row["activity_persons"] ?></p>
                                <p class="card-text">活動費用：<?= $row["activity_fee"] ?></p>
                            </div>
                            <p class="card-text activity_cont"><small class="text-muted"><?= $row["activity_content"] ?></small></p>
                        </div>
                    </div>
                    <!-- ================= 修改 ================= -->
                    <div class="col-3 ">
                        <div class=""></div>
                        <a class="btn btn-outline-success mx-1" href="goral_biker_activity-upload.php?id=<?= $row["id"] ?>&status=<?= $row["activity_status_id"] ?>&venue=<?= $row["activity_venue_id"] ?>">編輯</a>
                        <a href="#" class="btn btn-outline-warning mx-1">下架</a>
                        <a href="#" class="btn btn-outline-danger mx-1">刪除</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- ================= 分頁 ================= -->
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="goral_biker_activity-list.php?p=1" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php if ($p == 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p ?>">
                                <?= $p ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p + 1 ?>">
                                <?= $p + 1 ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p + 2 ?>">
                                <?= $p + 2 ?>
                            </a>
                        </li>
                    <?php elseif ($p + 1 <= $page_count) : ?>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p - 1 ?>">
                                <?= $p - 1 ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p ?>">
                                <?= $p ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p + 1 ?>">
                                <?= $p + 1 ?>
                            </a>
                        </li>
                    <?php elseif ($p == $page_count) : ?>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p - 2 ?>">
                                <?= $p - 2 ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p - 1 ?>">
                                <?= $p - 1 ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p ?>">
                                <?= $p ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="page-item">
                        <a class="page-link" href="goral_biker_activity-list.php?p=<?= $page_count ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>