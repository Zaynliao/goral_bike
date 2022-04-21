<?php
require_once("db-connect.php");

// $path = $_SERVER["REQUEST_URI"];
// echo $path . "<br>";
// // 透過路徑取得檔名
// $file = basename($path);
// echo $file;



if (isset($_GET["valid"])) {
    $valid = $_GET["valid"];
} else {
    $valid = 1;
}

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

if (!isset($_GET["type"])) {
    $type = 1;
} else {
    $type = $_GET["type"];
}

if (!isset($_GET["cate"])) {
    $cate = 0;
    $cates = "";
} else {
    $cate = $_GET["cate"];
    $cates = "AND classes.course_category_id=$cate";
}

switch ($type) {
    case "1":
        $order = "course_id ASC";
        break;
    case "2":
        $order = "course_id DESC";
        break;
    case "3":
        $order = "course_date ASC";
        break;
    case "4";
        $order = "course_date DESC";
        break;
    default:
        $order = "course_id ASC";
}

switch ($statu) {
}

$sql = "SELECT * FROM classes WHERE course_valid='$valid' $cates";
$result = $conn->query($sql);
$total = $result->num_rows;

$sqlLoca = "SELECT * FROM course_location";
$resultLoca = $conn->query($sqlLoca);
$rowsLoca = $resultLoca->fetch_all(MYSQLI_ASSOC);

$sqlStatu = "SELECT * FROM course_status";
$resultStatu = $conn->query($sqlStatu);
$rowsStatu = $resultStatu->fetch_all(MYSQLI_ASSOC);

$sqlCate = "SELECT * FROM course_category";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);

$per_page = 6;

//無條件進位 CEIL();
$page_count = CEIL($total / $per_page);

$start = ($p - 1) * $per_page;

// ASC升冪 ; DESC 降冪
$sql = "SELECT classes.*, course_category.*, course_location.*, course_status.*
FROM classes
LEFT JOIN course_category on classes.course_category_id=course_category.course_category_id
LEFT JOIN course_location on classes.course_location_id=course_location.course_location_id
LEFT JOIN course_status on classes.course_status_id=course_status.course_status_id
WHERE course_valid='$valid' $cates
ORDER BY $order
LIMIT $start,$per_page";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$user_count = $result->num_rows;



?>

<!doctype html>
<html lang="en">

<head>
    <title>Course List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .product-img {
            width: 100%;
        }

        .object-cover {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container mb-5">
        <div class="py-2">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="../goral_bike_layout/goral_biker_course-list.php?valid=1&p=1&type=<?= $type?>" class="nav-link <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) : echo "active" ?><?php endif; ?>" aria-current="page">已上架商品</a>
                </li>
                <li class="nav-item">
                    <a href="../goral_bike_layout/goral_biker_course-list.php?valid=0&p=1&type=<?= $type ?>" class="nav-link <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0) : echo "active" ?><?php endif; ?>" aria-current="page">已下架商品</a>
                </li>
            </ul>
        </div>


        <div class="text-end mb-2">
            <a href="../goral_bike_layout/goral_biker_course-list.php?p=1&type=1&valid=<?= $valid ?>" class="btn btn-dark text-white <?php if ($cate == 0) echo "active"?>">全部課程</a>
            <a href="../goral_bike_layout/goral_biker_course-list.php?p=1&type=1&valid=<?= $valid ?>&cate=1" class="btn btn-success text-white <?php if ($cate == 1) echo "active" ?>">入門課程</a>
            <a href="../goral_bike_layout/goral_biker_course-list.php?p=1&type=1&valid=<?= $valid ?>&cate=2" class="btn btn-danger text-white <?php if ($cate == 2) echo "active" ?>">進階課程</a>
        </div>


        <div class="text-end">
            <a href="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=1&valid=<?= $valid ?><?php if ($cate == 0) : ?><?php else : echo "&cate=$cate" ?><?php endif; ?>" class="btn-sm btn-dark text-white text-decoration-none <?php if ($type == 1) echo "active" ?>">依序號正序</a>
            <a href="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=2&valid=<?= $valid ?><?php if ($cate == 0) : ?><?php else : echo "&cate=$cate" ?><?php endif; ?>" class="btn-sm btn-dark text-white text-decoration-none <?php if ($type == 2) echo "active" ?>">依序號反序</a>
            <a href="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=3&valid=<?= $valid ?><?php if ($cate == 0) : ?><?php else : echo "&cate=$cate" ?><?php endif; ?>" class="btn-sm btn-dark text-white text-decoration-none <?php if ($type == 3) echo "active" ?>">依課程時間正序</a>
            <a href="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=4&valid=<?= $valid ?><?php if ($cate == 0) : ?><?php else : echo "&cate=$cate" ?><?php endif; ?>" class="btn-sm btn-dark text-white text-decoration-none <?php if ($type == 4) echo "active" ?>">依課程時間反序</a>
        </div>



        <div class="pt-4 pb-2 text-end">
            <a class="btn btn-secondary text-white position-relative" href="../goral_bike_layout/goral_biker_course-insert.php"<?php if (isset($_GET["valid"]) && $_GET["valid"] == 0) : echo "hidden" ?> <?php endif; ?>>新增課程</a>
        </div>
        <div class="row">
            <h2>COURSE LIST</h2>
            <?php if ($user_count > 0) : ?>
                <?php foreach ($rows as $row) : ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card shadow-sm">
                            <figure class="product-img text-center">
                                <img class="object-cover" src="../course/images/<?= $row["course_pictures"] ?>" alt="">
                            </figure>
                            <div class="pb-2 px-3">
                                <span class="badge 
                        <?php if ($row["course_category_id"] == 1) : echo "bg-success" ?>
                        <?php else : echo "bg-danger" ?>
                        <?php endif; ?>
                        rounded-pill px-2 me-1"><?= $row["course_category_name"] ?>
                                </span>
                                <span class="badge 
                        <?php if ($row["course_status_id"] == 1) : echo "bg-secondary" ?>
                        <?php elseif ($row["course_status_id"] == 2) : echo "bg-success" ?>
                        <?php else : echo "bg-danger" ?>
                        <?php endif; ?>
                        rounded-pill px-2 me-1"><?= $row["course_status_name"] ?>
                                </span>
                                <span class="badge bg-dark rounded-pill px-2 me-1">
                                    <?= $row["course_location_name"] ?>
                                </span>
                                <span class="badge bg-dark rounded-pill px-2 me-2">
                                    <?= $row["course_price"] ?> / 人
                                </span>
                                <div class="name-time mt-3">
                                    <h3 class="text-dark fw-bold"><?= $row["course_title"] ?></h3>
                                    <h5 class="text-dark fw-bold"><?= $row["course_date"] ?></h5>
                                </div>

                                <div class="d-grid mt-4">
                                    <a class="btn btn-info bg-dark border-dark text-white mb-2 fw-bold" href="../goral_bike_layout/goral_biker_course-upload.php?id=<?= $row["course_id"] ?>&statu=<?= $row["course_status_id"] ?>&loca=<?= $row["course_location_id"] ?>&cate=<?= $row["course_category_id"] ?>">修改課程</a>
                                </div>
                                <div class="d-grid">
                                    <button class="delete-btn btn btn-info bg-secondary border-secondary text-white mb-2 fw-bold" data-id="<?= $row["course_id"] ?>" <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0) : echo "hidden" ?> <?php endif; ?>>下架課程</button>
                                    <button class="valid-btn btn btn-info text-white mb-2 fw-bold" data-id="<?= $row["course_id"] ?>" <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) : echo "hidden" ?> <?php endif; ?>>上架課程</button>
                                    <button class="isdelete-btn btn btn-info text-white mb-2 bg-danger border-danger fw-bold" data-id="<?= $row["course_id"] ?>" <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) : echo "hidden" ?> <?php endif; ?>>刪除課程</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : echo "<p class='text-center mt-4 fw-bold text-secondary'>無資料符合<br>請選擇其他條件</p>" ?>
            <?php endif; ?>
            <div class="py-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination  justify-content-center">
                        <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                            <li class="page-item <?php if ($p == $i) echo "active" ?>">
                                <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?p=<?= $i ?>&type=<?= $type ?><?php if ($cate == 0) : ?><?php else : echo "&cate=$cate" ?><?php endif; ?>&valid=<?= $valid ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                    <div class="py-2 text-center">
                        第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <?php require("../course/api/js.php") ?>
    <script>
        let deleteBtns = document.querySelectorAll(".delete-btn");
        let isdeleteBtns = document.querySelectorAll(".isdelete-btn");
        let validBtns = document.querySelectorAll(".valid-btn");

        for (let i = 0; i < deleteBtns.length; i++) {
            deleteBtns[i].addEventListener("click", function() {
                console.log("click");
                let id = this.dataset.id;
                deleteCourse(id);
            })
        }

        for (let i = 0; i < isdeleteBtns.length; i++) {
            isdeleteBtns[i].addEventListener("click", function() {
                console.log("click");
                let id = this.dataset.id;
                isdeleteCourse(id);
            })
        }

        for (let i = 0; i < validBtns.length; i++) {
            validBtns[i].addEventListener("click", function() {
                console.log("click");
                let id = this.dataset.id;
                validCourse(id);
            })
        }

        function deleteCourse(id) {
            $.ajax({
                    method: "POST",
                    url: "../course/api/course-doDelete.php",
                    dataType: "json",
                    data: {
                        id: id
                    }
                })
                .done(function(response) {
                    let status = response.status;
                    let content = "";
                    switch (status) {
                        case 0:
                            content = response.message;
                            alert(content)
                            break;
                        case 1:
                            content = response.message;
                            alert(content)
                            //重新整理頁面
                            location.reload()
                            break;
                    }

                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        }

        function isdeleteCourse(id) {
            $.ajax({
                    method: "POST",
                    url: "../course/api/course-isdoDelete.php",
                    dataType: "json",
                    data: {
                        id: id
                    }
                })
                .done(function(response) {
                    let status = response.status;
                    let content = "";
                    switch (status) {
                        case 0:
                            content = response.message;
                            alert(content)
                            break;
                        case 1:
                            content = response.message;
                            alert(content)
                            //重新整理頁面
                            location.reload()
                            break;
                    }

                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        }

        function validCourse(id) {
            $.ajax({
                    method: "POST",
                    url: "../course/api/course-doValid.php",
                    dataType: "json",
                    data: {
                        id: id
                    }
                })
                .done(function(response) {
                    let status = response.status;
                    let content = "";
                    switch (status) {
                        case 0:
                            content = response.message;
                            alert(content)
                            break;
                        case 1:
                            content = response.message;
                            alert(content)
                            //重新整理頁面
                            location.reload()
                            break;
                    }

                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
        }
    </script>
</body>

</html>