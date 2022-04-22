<?php
require_once("db-connect.php");

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

if(isset($_GET["date1"]) && isset($_GET["date2"])){
    $date1=$_GET["date1"];
    $date2=$_GET["date2"];
    $dateorder="AND classes.course_date BETWEEN '$date1' AND '$date2'";
    $dateget="&date1=$date1&date2=$date2";
} else{
    $dateorder="";
    $dateget="";
}

// for 每頁幾筆
if (!isset($_GET["per_page"])) {
    $per_page = 10;
} else {
    $per_page = $_GET["per_page"];
}

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $searchs =" AND (course_title LIKE '%$search%'
    OR course_category_name LIKE '%$search%'
    OR course_status_name LIKE '%$search%'
    OR course_price LIKE '%$search%'
    OR course_date LIKE '%$search%')";
    $searchurl="&searchurl=$search";
} 
else {
    $search="";
    $searchs ="";
    $searchurl="";
}

if (!isset($_GET["cate"])) {
    $cate = 0;
    $cates = "";
    $cateurl ="";
} else {
    $cate = $_GET["cate"];
    $cates = "AND classes.course_category_id=$cate";
    $cateurl ="&cate=$cate";
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
    case "5":
        $order = "course_price ASC";
        break;
    case "6";
        $order = "course_price DESC";
        break;
    default:
        $order = "course_id ASC";
}



$sql = "SELECT classes.*, course_category.*, course_location.*, course_status.*
FROM classes
LEFT JOIN course_category on classes.course_category_id=course_category.course_category_id
LEFT JOIN course_location on classes.course_location_id=course_location.course_location_id
LEFT JOIN course_status on classes.course_status_id=course_status.course_status_id
WHERE course_valid='$valid' $cates $dateorder $searchs";
$result = $conn->query($sql);
$total = $result->num_rows;
 //計算所需分頁數量
$page_count = ceil($total / $per_page);
$start = ($p - 1) * $per_page;

$sqlLoca = "SELECT * FROM course_location";
$resultLoca = $conn->query($sqlLoca);
$rowsLoca = $resultLoca->fetch_all(MYSQLI_ASSOC);

$sqlStatu = "SELECT * FROM course_status";
$resultStatu = $conn->query($sqlStatu);
$rowsStatu = $resultStatu->fetch_all(MYSQLI_ASSOC);

$sqlCate = "SELECT * FROM course_category";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);



// ASC升冪 ; DESC 降冪
$sql = "SELECT classes.*, course_category.*, course_location.*, course_status.*
FROM classes
LEFT JOIN course_category on classes.course_category_id=course_category.course_category_id
LEFT JOIN course_location on classes.course_location_id=course_location.course_location_id
LEFT JOIN course_status on classes.course_status_id=course_status.course_status_id
WHERE course_valid='$valid' $cates $dateorder $searchs
ORDER BY $order
LIMIT $start,$per_page";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$course_count = $result->num_rows;



?>

<!doctype html>
<html lang="en">

<head>
    <title>Course List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
    .product-img {
        width: 100%;
    }

    .object-cover {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .page-item.active .page-link {
        background-color: #000000;
        border-color: #000000;
    }

    .page-link {
        color: #6c757d;
    }

    .page-link:hover {
        color: #000000;
    }

    .btn-dark:hover {
        background-color: #000000;
    }
    </style>
</head>

<body>
    <div class="container mb-5 mt-4">

        <!-- 每分頁顯示資料數量 -->
        <div class="d-flex align-items-end mb-3 flex-column-reverse flex-sm-row">
            <div class="col-sm-6 col-12">
                <div class="d-flex flex-nowrap">
                    <span class="text-nowrap me-2 pt-2">
                        顯示
                    </span>
                    <select class="me-2 form-select w-auto" aria-label="Default select example" id="pageCount">
                        <option value="5" <?php if ($per_page == 5) echo "selected" ?>>5</option>
                        <option value="10" <?php if ($per_page == 10) echo "selected" ?>>10</option>
                        <option value="15" <?php if ($per_page == 15) echo "selected" ?>>15</option>
                    </select>
                    <span class="text-nowrap pt-2">
                        筆數
                    </span>
                </div>
                <!-- 排序方式選擇 -->
                <div class="mt-2">
                    <select class="form-select w-auto" name="" id="select"
                        onchange="location.href=this.options[this.selectedIndex].value;">
                        <option
                            value="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=1&valid=<?= $valid ?><?php if ($cate !== 0) echo "&cate=$cate"?><?=$dateget?><?=$searchurl?>"
                            <?php if ($type == 1) echo "selected" ?>>依序號正序</option>
                        <option
                            value="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=2&valid=<?= $valid ?><?php if ($cate !== 0) echo "&cate=$cate"?><?=$dateget?><?=$searchurl?>"
                            <?php if ($type == 2) echo "selected" ?>>依序號反序</option>
                        <option
                            value="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=3&valid=<?= $valid ?><?php if ($cate !== 0) echo "&cate=$cate"?><?=$dateget?><?=$searchurl?>"
                            <?php if ($type == 3) echo "selected" ?>>依課程時間正序</option>
                        <option
                            value="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=4&valid=<?= $valid ?><?php if ($cate !== 0) echo "&cate=$cate"?><?=$dateget?><?=$searchurl?>"
                            <?php if ($type == 4) echo "selected" ?>>依課程時間反序</option>
                        <option
                            value="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=5&valid=<?= $valid ?><?php if ($cate !== 0) echo "&cate=$cate"?><?=$dateget?><?=$searchurl?>"
                            <?php if ($type == 5) echo "selected" ?>>依課程價錢正序</option>
                        <option
                            value="../goral_bike_layout/goral_biker_course-list.php?p=<?= $p ?>&type=6&valid=<?= $valid ?><?php if ($cate !== 0) echo "&cate=$cate"?><?=$dateget?><?=$searchurl?>"
                            <?php if ($type == 6) echo "selected" ?>>依課程價錢反序</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-12 mb-2 mb-sm-0">
                <div class="text-end">
                    <a class="btn btn-dark text-white position-relative fw-bold"
                        href="../goral_bike_layout/goral_biker_course-insert.php"
                        <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0) echo "hidden" ?>>新增課程</a>
                </div>

                <div class="text-end">
                    <a href="../goral_bike_layout/goral_biker_course-list.php?p=1&type=1&valid=<?= $valid ?>"
                        class="btn btn-dark text-white fw-bold" <?php if ($cate == 0) echo "active"?>
                        <?php if ($valid!=0) echo "hidden"?>>全部課程</a>
                    <a href="../goral_bike_layout/goral_biker_course-list.php?p=1&type=1&cate=1&valid=<?= $valid ?>"
                        class="btn btn-success text-white fw-bold" <?php if ($cate == 1) echo "active" ?>
                        <?php if ($valid!=0) echo "hidden"?>>入門課程</a>
                    <a href="../goral_bike_layout/goral_biker_course-list.php?p=1&type=1&cate=2&valid=<?= $valid ?>"
                        class="btn btn-danger text-white fw-bold" <?php if ($cate == 2) echo "active" ?>
                        <?php if ($valid!=0) echo "hidden"?>>進階課程</a>
                </div>
                <!-- 搜尋列 -->
                <div class="my-2">
                    <form class="d-flex justify-content-end" action="../goral_bike_layout/goral_biker_course-list.php">
                        <div class="d-flex">
                            <input type="hidden" name="valid" id="valid" value="<?= $valid ?>">
                            <input type="hidden" name="cate" id="cate" value="<?= $cate ?>"
                            <?php if(!$cate) echo "disabled"?>>
                            <?php if(isset($_GET["date1"]) && isset($_GET["date2"])):?>
                            <input type="hidden" name="date1" id="date1" value="<?=$_GET["date1"]?>" 
                            <?php if(!$date1) echo "disabled"?>>
                            <input type="hidden" name="date2" id="date2" value="<?=$_GET["date2"]?>" 
                            <?php if(!$date2) echo "disabled"?>>
                            <?php endif;?>
                            <input class="form-control me-2" type="search" placeholder="搜尋關鍵字" aria-label="Search"
                                name="search" value="<?=$search?>">
                            <button class="btn btn-secondary fw-bold text-nowrap" type="submit">搜尋</button>
                        </div>
                    </form>
                </div>

                <!-- 課程時間篩選 -->
                <div class="">
                    <form action="../goral_bike_layout/goral_biker_course-list.php" onsubmit="return toVaild()">
                        <div class="row justify-content-end gx-2">
                            <input type="hidden" name="cate" value="<?= $cate ?>" <?php if(!$cate) echo "disabled"?>>
                            <input type="hidden" name="search" value="<?= $search ?>"
                                <?php if(!$search) echo "disabled"?>>
                            <input type="hidden" name="valid" value="<?= $valid ?>">
                            <div class="col-auto">
                                <input type="date" name="date1" id="date1" <?php if(isset($_GET["date1"])):?>
                                    value="<?=$_GET["date1"]?>" <?php endif;?> class="form-control text-secondary">
                            </div>
                            <div class="col-auto">
                                <label class="form-control-label" for="">~</label>
                            </div>
                            <div class="col-auto">
                                <input type="date" name="date2" id="date2" <?php if(isset($_GET["date2"])):?>
                                    value="<?=$_GET["date2"]?>" <?php endif;?> class="form-control text-secondary">
                            </div>
                            <div class="col-auto">
                                <button type="submit" id="test-btn" class="btn btn-secondary fw-bold">查詢</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- 課程列表顯示 -->
        <div class="row">
            <h1 class="fw-bold">COURSE LIST -</h1>
            <?php if ($course_count > 0) : ?>
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
                        rounded-pill px-2 me-1" <?php if (!$row["course_category_id"]) : echo "hidden"?>
                            <?php endif; ?>><?= $row["course_category_name"] ?>
                        </span>
                        <span class="badge 
                        <?php if ($row["course_status_id"] == 1) : echo "bg-secondary" ?>
                        <?php elseif ($row["course_status_id"] == 2) : echo "bg-success" ?>
                        <?php else : echo "bg-danger" ?>
                        <?php endif; ?>
                        rounded-pill px-2 me-1" <?php if (!$row["course_status_id"]) : echo "hidden"?>
                            <?php endif; ?>><?= $row["course_status_name"] ?>
                        </span>
                        <span class="badge bg-dark rounded-pill px-2 me-1"
                            <?php if (!$row["course_location_id"]) : echo "hidden"?> <?php endif; ?>>
                            <?= $row["course_location_name"] ?>
                        </span>
                        <span class="badge bg-dark rounded-pill px-2 me-2"
                            <?php if (!$row["course_price"]) : echo "hidden"?> <?php endif; ?>>
                            <?= $row["course_price"] ?> / 人
                        </span>
                        <div class="name-time mt-3">
                            <h3 class="text-dark fw-bold"><?= $row["course_title"] ?></h3>
                            <h5 class="text-dark fw-bold"><?= $row["course_date"] ?></h5>
                        </div>

                        <div class="d-grid mt-4">
                            <a class="btn btn-dark text-white mb-2 fw-bold"
                                href="../goral_bike_layout/goral_biker_course-upload.php?id=<?= $row["course_id"] ?>&statu=<?= $row["course_status_id"] ?>&loca=<?= $row["course_location_id"] ?>&cate=<?= $row["course_category_id"] ?>">修改課程</a>
                        </div>
                        <div class="d-grid">
                            <button class="delete-btn btn btn-secondary text-white mb-2 fw-bold"
                                data-id="<?= $row["course_id"] ?>"
                                <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0) : echo "hidden" ?>
                                <?php endif; ?>>下架課程</button>
                            <button class="valid-btn btn btn-info text-white mb-2 fw-bold"
                                data-id="<?= $row["course_id"] ?>"
                                <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) : echo "hidden" ?>
                                <?php endif; ?>>上架課程</button>
                            <button class="isdelete-btn btn btn-danger text-white mb-2 fw-bold"
                                data-id="<?= $row["course_id"] ?>"
                                <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) : echo "hidden" ?>
                                <?php endif; ?>>刪除課程</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <p class="text-center mt-4 fw-bold text-secondary">
                無資料符合
                <br>
                請選擇其他條件
            </p>
            <?php endif; ?>
            <div class="py-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination mb-0  justify-content-center">
                        <?php if ($p != 1) : ?>
                        <li class="page-item">
                            <a class="page-link"
                                href="goral_biker_course-list.php?p=<?= $p - 1 ?>&type=<?= $type ?>&per_page=<?= $per_page ?>&evalid=<?= $valid ?>&search=<?= $search ?><?=$dateget?><?=$cateurl?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="page-item active">
                            <a class="page-link"
                                href="goral_biker_course-list.php?p=<?= $p ?>&type=<?= $type ?>&per_page=<?= $per_page ?>&valid=<?= $valid ?>&search=<?= $search ?><?=$dateget?><?=$cateurl?>"><?= $p ?>
                            </a>
                        </li>
                        <?php if ($p < $page_count) : ?>
                        <li class="page-item">
                            <a class="page-link"
                                href="goral_biker_course-list.php?p=<?= $p + 1 ?>&type=<?= $type ?>&per_page=<?= $per_page ?>&valid=<?= $valid ?>&search=<?= $search ?><?=$dateget?><?=$cateurl?>"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>

                        <?php endif; ?>

                    </ul>
                </nav>
                <div class="py-2 text-center fw-bold text-secondary">
                    第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
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

            $(function() {
                $("#select").change(function() {
                    var op = $("#select").find('option');
                });
            })

            // 切換分頁的js
            let pageCount = document.querySelector("#pageCount");
            pageCount.addEventListener("change", function(e) {
                console.log(e.target.value);
                location.href =
                    `goral_biker_course-list.php?per_page=${e.target.value}&valid=<?= $valid ?>&type=<?= $type ?>&search=<?= $search ?>`;
            })

            function toVaild() {
                var date1Val = document.getElementById("date1").value;
                var date2Val = document.getElementById("date2").value;

                if (date1Val !== "" && date2Val !== "") {
                    return true;
                } else {
                    location.href = "goral_biker_course-list.php?valid=<?=$valid?><?=$cateurl?>";
                    return false;
                }
            }
            </script>
</body>

</html>