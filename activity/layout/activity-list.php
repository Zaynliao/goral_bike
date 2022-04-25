<?php
require_once("../db-connect.php");

/* ================= 判斷每頁幾筆 =================  */
if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

/* ================= 判斷上架狀態 =================  */
if (!isset($_GET["valid"])) {
    $valid = 1;
} else {
    $valid = $_GET["valid"];
}

/* ================= 判斷活動排序 =================  */
if (!isset($_GET["type"])) {
    $type = 5;
} else {
    $type = $_GET["type"];
}

/* ================= 排序 =================  */
switch ($type) {
    case "0":
        $order = "activity_fee ASC"; // 價錢 $-$$$
        break;
    case "1":
        $order = "activity_fee DESC"; // 價錢 $$$-$
        break;
    case "2":
        $order = "activity_date ASC"; // 活動日期 ▲
        break;
    case "3";
        $order = "activity_date DESC"; //活動日期 ▼
        break;
    case "4";
        $order = "id ASC"; //上架時間 新-舊
        break;
    case "5";
        $order = "id DESC"; //上架時間 舊-新
        break;
    default:
        $order = "id DESC"; //上架時間 舊-新
}




if (!isset($_GET["activity_venue_id"]) && !isset($_GET["activity_status_id"])) {
    $activity_venue_id = "%";
    $activity_status_id = "%";

    $sqlAct = "SELECT activity.*, activity_status.activity_status_name, activity_venue.activity_venue_name FROM activity
    LEFT JOIN activity_status on activity.activity_status_id=activity_status.id
    LEFT JOIN activity_venue on activity.activity_venue_id=activity_venue.id
    WHERE activity_valid='$valid'
    AND activity_venue_id LIKE '$activity_venue_id'
    AND activity_status_id LIKE '$activity_status_id'
    ORDER BY $order

    ";
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
    WHERE activity_valid='$valid'
    AND activity_venue_id LIKE '$activity_venue_id'
    AND activity_status_id LIKE '$activity_status_id'
    ORDER BY $order


    LIMIT $start,$per_page";
    $resultAct = $conn->query($sqlAct);
    $rowsAct = $resultAct->fetch_all(MYSQLI_ASSOC);
} elseif (isset($_GET["activity_venue_id"])) {
    $activity_venue_id = $_GET["activity_venue_id"];
    $activity_status_id = "%";
    $sqlAct = "SELECT activity.*, activity_status.activity_status_name, activity_venue.activity_venue_name FROM activity
    LEFT JOIN activity_status on activity.activity_status_id=activity_status.id
    LEFT JOIN activity_venue on activity.activity_venue_id=activity_venue.id
    WHERE activity_valid='$valid'
    AND activity_venue_id LIKE '$activity_venue_id'
    AND activity_status_id LIKE '$activity_status_id'
    ORDER BY $order

    ";
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
    WHERE activity_valid='$valid'
    AND activity_venue_id LIKE '$activity_venue_id'
    AND activity_status_id LIKE '$activity_status_id'
    ORDER BY $order

    LIMIT $start,$per_page";
    $resultAct = $conn->query($sqlAct);
    $rowsAct = $resultAct->fetch_all(MYSQLI_ASSOC);
} elseif (isset($_GET["activity_status_id"])) {
    $activity_status_id = $_GET["activity_status_id"];
    $activity_venue_id = "%";
    $sqlAct = "SELECT activity.*, activity_status.activity_status_name, activity_venue.activity_venue_name FROM activity
    LEFT JOIN activity_status on activity.activity_status_id=activity_status.id
    LEFT JOIN activity_venue on activity.activity_venue_id=activity_venue.id
    WHERE activity_valid='$valid'
    AND activity_status_id LIKE '$activity_status_id'
    AND activity_venue_id LIKE '$activity_venue_id'
    ORDER BY $order

    ";
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
    WHERE activity_valid='$valid'
    AND activity_status_id LIKE '$activity_status_id'
    AND activity_venue_id LIKE '$activity_venue_id'
    ORDER BY $order

    LIMIT $start,$per_page";
    $resultAct = $conn->query($sqlAct);
    $rowsAct = $resultAct->fetch_all(MYSQLI_ASSOC);
}

?>


<!doctype html>

<html lang="en">

<head>
    <title>Activity list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>


<body>
    <div class="container mt-5">
        <!-- ================= 活動時間篩選 ================= -->
        <div class="d-flex justify-content-end">
            <!-- ================= 排序 ================= -->
            <div class="mt-2 d-flex">
                <?php // 排序方式名稱陣列
                $typeNames = ["價錢 $-$$$", "價錢 $$$-$", "活動日期 ▲", "活動日期 ▼", "上架時間 新-舊", "上架時間 舊-新"];?> 
                <div>
                    <select class="form-select" aria-label="Default select example" 
                    onchange="location.href=this.options[this.selectedIndex].value;">
                    <?php for ($i = 0; $i <= 5; $i++): ?>

                        <option <?php if ($type == $i )echo "selected"?> value="../goral_bike_layout/goral_biker_activity-list.php?valid=<?=$valid?>&type=<?=$i?>&activity_venue_id=<?=$activity_venue_id?>&activity_status_id=<?=$activity_status_id?>">
                        <?=$typeNames[$i]?>
                        </option>
                    <?php endfor; ?>
                    </select>
                </div>
                <div>
                    <a href="../goral_bike_layout/goral_biker_activity-insert.php" class="btn btn-primary mx-2">新增活動</a>
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
                    <div class="col-3 align-items-center d-flex ps-5">
                        <div class="d-flex g-0">
                            <a class="btn btn-outline-success mx-1" href="goral_biker_activity-upload.php?id=<?= $row["id"] ?>&status=<?= $row["activity_status_id"] ?>&venue=<?= $row["activity_venue_id"] ?>">編輯</a>
                            <?php if ($valid == 1) : ?>
                                <a href="../activity/api/activity-doDelisting.php?id=<?= $row["id"] ?>" class="btn btn-outline-warning mx-1">
                                    下架
                                </a>
                            <?php else :  ?>
                                <a href="../activity/api/activity-doListed.php?id=<?= $row["id"] ?>" class="btn btn-outline-warning mx-1">
                                    上架
                                </a>
                            <?php endif; ?>
                            <a href="../activity/api/activity-doDelete.php?id=<?= $row["id"] ?>" class="btn btn-outline-danger mx-1">刪除</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- ================= 分頁 ================= -->
        <div class="d-flex justify-content-center mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="goral_biker_activity-list.php?p=1&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php if ($page_count == 1) : ?>
                        <li class="page-item active">
                            <a class="page-link " href="goral_biker_activity-list.php?p=1&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                1
                            </a>
                        </li>
                    <?php elseif ($page_count == 2) : ?>
                        <?php if ($p == 1) : ?>
                            <li class="page-item active">
                                <a class="page-link " href="goral_biker_activity-list.php?p=1&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    1
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=2&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    2
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=1&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    1
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link " href="goral_biker_activity-list.php?p=2&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    2
                                </a>
                            </li>

                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($p == 1) : ?>
                            <li class="page-item active">
                                <a class="page-link " href="goral_biker_activity-list.php?p=<?= $p ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p ?>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p + 1 ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p + 1 ?>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p + 2 ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p + 2 ?>
                                </a>
                            </li>
                        <?php elseif ($p + 1 <= $page_count) : ?>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p - 1 ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p - 1 ?>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link " href="goral_biker_activity-list.php?p=<?= $p ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p ?>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p + 1 ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p + 1 ?>
                                </a>
                            </li>
                        <?php elseif ($p == $page_count) : ?>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p - 2 ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p - 2 ?>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p - 1 ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p - 1 ?>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="goral_biker_activity-list.php?p=<?= $p ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>">
                                    <?= $p ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li class="page-item">
                        <a class="page-link" href="goral_biker_activity-list.php?p=<?= $page_count ?>&activity_venue_id=<?= $activity_venue_id ?>&type=<?=$i?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>