<?php
require_once("../db-connect.php");

//isset()函數
//      判斷變數是否存在，有就回傳 1 (true)，沒有就回傳空值
//      NULL -> 不存在
//      0 -> 存在
//      "" -> 存在
//empty()
//      判斷"值"是否為空的，沒有就回傳 1(true)，有"值"就不回傳
//      NULL -> 有值
//      0 -> 沒有值
//      "" -> 沒有值


// ==========判斷有無上下架屬性==========


if (!isset($_GET["valid"])) {   
    // 若 URL 沒有 valid 的變數，$valid 放入預設值 1 (上架)
    $valid = 1;
    // $validURL = "";  
    // 由於自訂義 URL 基底為 "../..php?valid=$valid"，故不另設 $validURL
} else {  
    // 若 URL 有 valid 的變數，$valid 放入 $_GET["valid"] 的值
    $valid = $_GET["valid"];
}

// ==========判斷有無頁數屬性==========

if (!isset($_GET["p"])) {
    // 若 URL 沒有 p 的變數，$p 放入預設值 1 (第 1 頁)
    $p = 1;
    $pURL = "";
    // "../..php?valid=$valid"
} else {
     // 若 URL 有 p 的變數，$p 放入 $_GET["p"] 的值
    $p = $_GET["p"];
    $pURL = "&p=$p";
     // "../..php?valid=$valid" + "$pURL"
     // "../..php?valid=$valid&p=$p
}

// ==========判斷有無排序屬性==========

if (!isset($_GET["type"])) {
    $type = 4;
    $typeURL ="";
} else {
    $type = $_GET["type"];
    $typeURL = "&type=$type";
}

// ==========判斷有無期間屬性==========

if(isset($_GET["date1"]) && isset($_GET["date2"])){
    $date1=$_GET["date1"];
    $date2=$_GET["date2"];
    // 將期間篩選 SQL 語法存入字串
    $dateorder="AND classes.course_date BETWEEN '$date1' AND '$date2'";
    $dateURL="&date1=$date1&date2=$date2";
} else{
     // $dateorder = "空字串" -> 不使用期間篩選語法
    $dateorder="";
    $dateURL="";
}

// ==========判斷有無筆數屬性==========

if (!isset($_GET["per_page"])) {
    // 預設筆數 = 6
    $per_page = 6;
    $perpageURL ="";
} else {
    $per_page = $_GET["per_page"];
    $perpageURL ="&per_page=$per_page";
}

// ==========判斷有無關鍵字屬性==========

if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $searchs =" AND (course_title LIKE '%$search%'
    OR course_category_name LIKE '%$search%'
    OR course_status_name LIKE '%$search%'
    OR course_price LIKE '%$search%'
    OR course_date LIKE '%$search%')";
    $searchURL="&search=$search";
} 
else {
    $search="";
    $searchs ="";
    $searchURL="";
}

// ==========判斷有無課程類別屬性==========

if (!isset($_GET["cate"])) {
    // $cateNames=["全部課程","入門課程","進階課程"];
    // 此處 0 非指資料庫的 id，而是 $cateName 的 index[0]
    // 詳見   <!-- 課程類別按鈕(動態新增) -->
    $cate = 0;
    $cates = "";
    $cateURL = "";
} else {
    $cate = $_GET["cate"];
    $cates = "AND classes.course_category_id=$cate";
    $cateURL = "&cate=$cate";
}

// ==========判斷排序方式==========

switch ($type) {
    case "1":
        $order = "course_id ASC"; //ID 正序
        break;
    case "2":
        $order = "course_id DESC"; //ID 反序
        break;
    case "3":
        $order = "course_date ASC"; //時間正序
        break;
    case "4";
        $order = "course_date DESC"; //時間反序
        break;
    case "5":
        $order = "course_price ASC"; //價錢正序
        break;
    case "6";
        $order = "course_price DESC"; //價錢反序
        break;
    default:
        $order = "course_id ASC"; //ID 正序
}

// ==========特定範圍的資料抓取(計算分頁數量)==========

$sql = "SELECT *
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

// ==========特定範圍的資料抓取(利用上面計算的分頁數量)==========

$sql = "SELECT *
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

// ==========資料庫課程最小日期抓取==========
$sqlMinDate = "SELECT MIN(course_date) AS course_date FROM classes";
$resultMinDate = $conn->query($sqlMinDate);
$rowMinDate = $resultMinDate->fetch_assoc();

// ==========資料庫課程最大日期抓取==========
$sqlMaxDate = "SELECT MAX(course_date) AS course_date FROM classes";
$resultMaxDate = $conn->query($sqlMaxDate);
$rowMaxDate = $resultMaxDate->fetch_assoc();

// ==========資料庫課程類型抓取==========
$sqlCate = "SELECT * FROM course_category";
$resultCate = $conn->query($sqlCate);
$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);

// ==========資料庫課程地點抓取==========
$sqlLoca = "SELECT * FROM course_location";
$resultLoca = $conn->query($sqlLoca);
$rowsLoca = $resultLoca->fetch_all(MYSQLI_ASSOC);


?>

<!doctype html>
<html lang="en">

<head>
    <title>Course List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<style>
.product-img {
    width: 100%;
}

.object-cover {
    width: 100%;
    height: 200px;
    -o-object-fit: cover;
    object-fit: cover;
}

a{
    text-decoration: none;
}
</style>

<body>
    <div class="container mb-5 mt-4">
        <!-- header -->
        <div class="d-flex align-items-end mb-3 flex-column-reverse flex-sm-row">
            <!-- header-left -->
            <div class="col-12 col-sm-6 col-md-4">
                <!-- 每分頁顯示資料數量區塊 -->
                <div class="d-flex flex-nowrap">
                    <span class="text-nowrap me-2 pt-2">
                        顯示
                    </span>
                    <select class="me-2 form-select w-auto" aria-label="Default select example" id="pageCount">

                        <!-- 做 3 個 option ，筆數各為 6 的倍數 -->
                        <?php for($i=1;$i<=3;$i++): $per_page=$i*6; ?>

                        <option <?php if (isset($_GET["per_page"]) && $per_page == $_GET["per_page"] ) echo "selected"
                                 //若有 per_page 且 per_page 等於選擇的 per_page，則印出 selected 屬性?> value="<?=$per_page?>">
                            <!-- 筆數顯示 -->
                            <?=$per_page?>
                            <!-- if 的寫法 
                                    一、if() echo ""
                                    二、if(): echo ""
                                        elseif(): echo ""
                                        else:
                                        endif;
                                    三、if(){}elseif(){}else{};
                                -->
                        </option>

                        <?php endfor;?>

                    </select>
                    <span class="text-nowrap pt-2">
                        筆數
                    </span>
                </div>

                <!-- 排序方式選擇區塊 -->
                <div class="mt-2">

                    <?php

                    // 排序方式名稱陣列
                    $typeNames=["依序號正序","依序號反序","依課程時間正序","依課程時間反序","依課程價錢正序","依課程價錢反序"];

                    ?>

                    <!-- 選擇改變時，跳轉至此select的options中，被選中 option 順序的值 -->
                    <!-- option 的 value 可放 url -->
                    <select class="form-select w-auto" name=""
                        onchange="location.href=this.options[this.selectedIndex].value;">

                        <!-- 做 6 個 option -->
                        <?php for($i=0;$i<=5;$i++): ?>

                        <option
                            <?php if ($type == $i+1) echo "selected" //陣列以 0 為開頭，$type 以 1 為開頭，故 $type 隨著陣列的增加要加 1 ?>
                            value="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                                <?=$cateURL?><?=$pURL?>&type=<?=$i+1?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                            <!-- 排序類別名稱顯示 -->
                            <?=$typeNames[$i]?>
                        </option>

                        <?php endfor;?>
                    </select>
                </div>
            </div>
            <!-- header-right -->
            <div class="col-12 col-sm-6 col-md-8 mb-2 mb-sm-0">

                <!-- 新增功能區塊(bs5/右進視窗) -->
                <div class="text-end">
                    <!-- 新增右進視窗開啟按鈕 -->
                    <button class="btn btn-dark text-white position-relative fw-bold mb-2" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                        <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0) echo "hidden" // 若有 valid 且 valid 等於 0，則印出 hidden 屬性?>>新增課程</button>
                </div>
                <!-- 新增右進視窗區塊 -->
                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <!-- 新增視窗區塊 header -->
                    <div class="offcanvas-header">
                        <!-- 新增 title -->
                        <h3 id="offcanvasRightLabel" class="fw-bold">新增課程</h3>
                        <!-- 新增關閉紐 x -->
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <!-- 新增視窗內文區塊 body-->
                    <div class="offcanvas-body">
                        <!-- 新增-Form表單 -->
                        <div class="container">
                            <div class="row justify-content-center">
                                <div>
                                    <form action="../course/api/course-doInsert.php" enctype="multipart/form-data"
                                        method="post">
                                        <div class="mb-2">
                                            <label for="category">課程類別</label>
                                            <select class="form-control" name="category" id="category">
                                                <?php foreach ($rowsCate as $row) : ?>
                                                <option value="<?= $row["course_category_id"] ?>">
                                                    <?= $row["course_category_name"] ?>
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
                                                    src="../../goral_bike_First/course/icon/no-image.png"
                                                    class=" img-fluid" id="img-view">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="date">課程時間</label>
                                            <input class="form-control" type="date" name="date" id="date">
                                        </div>
                                        <div class="mb-2">
                                            <label for="location">課程地點</label>
                                            <select class="form-control" name="location" id="location">
                                                <?php foreach ($rowsLoca as $row) : ?>
                                                <option value="<?= $row["course_location_id"] ?>">
                                                    <?= $row["course_location_name"] ?>
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
                                            <input class="form-control" type="datetime-local" name="start_time"
                                                id="start_time">
                                        </div>
                                        <div class="mb-2">
                                            <label for="end_time">課程報名結束時間</label>
                                            <input class="form-control" type="datetime-local" name="end_time"
                                                id="end_time">
                                        </div>
                                        <div class="mb-2">
                                            <label for="price">課程費用</label>
                                            <input class="form-control" type="number" name="price" id="price">
                                        </div>
                                        <div class="mb-2">
                                            <label for="content">課程內容</label>
                                            <textarea class="form-control" name="content" id="content" cols="30"
                                                rows="10"></textarea>
                                        </div>
                                        <button class="btn btn-secondary text-white mb-2 me-2 fw-bold" type="reset"
                                            value="清除表單">清除</button>
                                        <button id="send" class="btn btn-dark text-white mb-2 fw-bold"
                                            type="submit">送出</button>
                                        <div class="text-end pb-4">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 課程類別按鈕(動態新增) -->
                <div class="text-end">

                    <?php
                    // 課程類別陣列
                    $cateNames=["全部課程","入門課程","進階課程"];
                    // 課程類別按鈕對應顏色陣列
                    $cateColors=["btn-dark","btn-success","btn-danger"];
                    ?>

                    <!-- 做 3 個課程類別按鈕 -->
                    <?php for($i=0;$i<=2;$i++):?>

                    <a <?php if ($cate == $i) echo "active"?> <?php if ($valid!=0) echo "hidden"?> href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?>
                            &cate=<?=$i?><?=$pURL?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>"
                        class="btn <?=$cateColors[$i]?> text-white fw-bold mb-2">
                        <!-- $cateColors=["btn-dark","btn-success","btn-danger"]; -->
                        <!-- 使對應不同類別按鈕的 class 樣式 -->
                        <!-- 課程類別名稱顯示 -->
                        <?=$cateNames[$i]?>
                    </a>

                    <?php endfor;?>
                </div>
                <!-- 篩選區塊(bs5/摺疊) -->
                <div class="text-end">
                    <!-- 篩選摺疊按鈕 -->
                    <button class="btn btn-secondary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        關鍵字/日期篩選
                    </button>
                </div>
                <!-- 篩選內容區塊 -->
                <div class="collapse mt-2" id="collapseExample">
                    <div class="card card-body">
                        <h5 class="fw-bold">請輸入篩選條件</h5>
                        <form class="form-filter" action="../goral_bike_layout/goral_biker_course-list.php">
                            <div class="row gap-2">
                                <!-- 關鍵字篩選 -->
                                <div class="col-12">
                                    <input class="form-control" type="search" placeholder="搜尋關鍵字" aria-label="Search"
                                        name="search" id="search" value="<?=$search?>">
                                </div>
                                <!-- 日期篩選 -->
                                <!-- value 預設值為課程最小 $rowMinDate['course_date']及最大值 $rowMaxDate['course_date'] -->
                                <div class="d-flex">
                                    <div class="col-6 pe-1">
                                        <input <?php if(isset($_GET["date1"])):?> value="<?=$_GET["date1"]?>"
                                            <?php else: ?> value="<?=$rowMinDate['course_date']?>" <?php endif;?>
                                            type="date" name="date1" id="date1" class="form-control text-secondary"
                                            required>
                                    </div>
                                    <div class="col-6 ps-1">
                                        <input <?php if(isset($_GET["date2"])):?> value="<?=$_GET["date2"]?>"
                                            <?php else: ?> value="<?=$rowMaxDate['course_date']?>" <?php endif;?>
                                            type="date" name="date2" id="date2" class="form-control text-secondary"
                                            required>
                                    </div>
                                </div>

                                <!-- 搜尋按鈕 -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-secondary fw-bold w-100 mt-1">搜尋</button>
                                </div>
                                <div>
                                    <!-- 額外需求值 -->
                                    <div class="hidden-input">
                                        <input type="hidden" name="cate" value="<?= $cate ?>"
                                            <?php if(!$cate) echo "disabled"?>>
                                        <input type="hidden" name="valid" value="<?= $valid ?>">
                                        <input type="hidden" name="per_page" value="<?= $per_page ?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- 課程列表顯示 -->
        <div class="row">
            <h1 class="fw-bold">COURSE LIST -</h1>
            <!-- 有資料就列出 -->
            <?php if ($course_count > 0) : ?>
            <!-- 全選範圍表單 -->
            <form action="../course/api/course-doBatchDelete.php" class="p-0" method="post">
                <!-- 批次功能按鈕區塊 -->
                <div class="d-flex align-items-center gap-3 mb-3 ms-3">
                    <!-- button 的 formaction 屬性可用來改變 from 的 action -->
                    <button type="submit" id="batchDel" name="batchDel"
                        class="batch-delete-btn btn btn-secondary fw-bold"
                        <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0) echo "hidden" ?>>批次下架</button>
                    <button type="submit" id="batchDel" name="batchDel" class="btn btn-secondary fw-bold"
                        formaction="../course/api/course-doBatchValid.php"
                        <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>批次上架</button>
                    <button type="submit" id="batchDel" name="batchDel" class="btn btn-secondary fw-bold"
                        formaction="../course/api/course-doBatchIsDoDelete.php"
                        <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>批次刪除</button>
                    <!-- 全選勾選checkbox -->
                    <span class="">
                        <input class="ms-1 me-2 form-check-input" type="checkbox" name="checkall" id="checkall"
                            onclick="CheckedAll()" />全選
                        <!-- 如果勾選，則執行 CheckedAll()-->
                    </span>
                </div>
                <!-- 課程顯示 -->
                <div class="d-flex flex-wrap">

                    <?php foreach ($rows as $row) : ?>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card shadow-sm mx-2">
                            <figure class="product-img text-center">

                                <img class="object-cover" src="../course/images/<?= $row["course_pictures"] ?>" alt="">
                                <!-- 每個產品的 checkbox -->
                                <div class="text-start">
                                    <input class="checkbox form-check-input ms-2 mt-2 position-absolute top-0 start-0"
                                        name="checkbox[]" id="checkbox" type="checkbox" value="<?= $row["course_id"] ?>"
                                        aria-label="">
                                </div>

                            </figure>
                            <div class="pb-2 px-3">
                                <a class="badge rounded-pill px-2 me-1
                                        <?php if ($row["course_category_id"] == 1) : echo "bg-success" ?>
                                        <?php else : echo "bg-danger" ?>
                                        <?php endif; //標籤顏色判斷 ?>"
                                    <?php if (!$row["course_category_id"]) echo "hidden" //標籤hidden判斷?>>

                                    <!-- 類別名稱顯示 -->
                                    <?= $row["course_category_name"] ?>
                                </a>
                                <a class="badge rounded-pill px-2 me-1
                                        <?php if ($row["course_status_id"] == 1) : echo "bg-secondary" ?>
                                        <?php elseif ($row["course_status_id"] == 2) : echo "bg-success" ?>
                                        <?php else : echo "bg-danger" ?>
                                        <?php endif; //標籤顏色判斷 ?>"
                                    <?php if (!$row["course_status_id"]) echo "hidden" //標籤hidden判斷?>>

                                    <!-- 狀態名稱顯示 -->
                                    <?= $row["course_status_name"] ?>
                                </a>
                                <span class="badge bg-dark rounded-pill px-2 me-1"
                                    <?php if (!$row["course_location_id"]) echo "hidden" //標籤hidden判斷?>>

                                    <!-- 地點名稱顯示 -->
                                    <?= $row["course_location_name"] ?>
                                </span>
                                <span class="badge bg-dark rounded-pill px-2 me-2"
                                    <?php if (!$row["course_price"]) echo "hidden"?>>

                                    <!-- 價錢顯示 -->
                                    <?= $row["course_price"] ?> / 人
                                </span>
                                <!-- 課程名稱與時間顯示 -->
                                <div class="name-time mt-3">
                                    <h3 class="text-dark fw-bold"><?= $row["course_title"] ?></h3>
                                    <h5 class="text-dark fw-bold"><?= $row["course_date"] ?></h5>
                                </div>
                                <!-- 單次修改課程按鈕 -->
                                <div class="d-grid mt-4">
                                    <!-- 需傳送特定單筆資料的各式欄位，以到修改頁面能取得 GET -->
                                    <a class="btn btn-dark text-white mb-2 fw-bold"
                                        href="../goral_bike_layout/goral_biker_course-upload.php?id=<?= $row["course_id"] ?>&statu=<?= $row["course_status_id"] ?>
                                        &loca=<?= $row["course_location_id"] ?>&cate=<?= $row["course_category_id"] ?>">修改課程</a>
                                </div>
                                <!-- 單次 delete/update 按鈕 -->
                                <div class="d-grid">
                                    <button formaction="../course/api/course-doDelete"
                                        class="delete-btn btn btn-secondary text-white mb-2 fw-bold"
                                        data-id="<?= $row["course_id"] ?>"
                                        <?php if (isset($_GET["valid"]) && $_GET["valid"] == 0)  echo "hidden" ?>>下架課程</button>
                                    <button formaction="../course/api/course-doValid.php"
                                        class="valid-btn btn btn-info text-white mb-2 fw-bold"
                                        data-id="<?= $row["course_id"] ?>"
                                        <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>上架課程</button>
                                    <button formaction="../course/api/course-isdoDelete.php"
                                        class="isdelete-btn btn btn-danger text-white mb-2 fw-bold"
                                        data-id="<?= $row["course_id"] ?>"
                                        <?php if (!isset($_GET["valid"]) || $_GET["valid"] == 1) echo "hidden" ?>>刪除課程</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>

            <?php endforeach; ?>

            <?php else : ?>

            <p class="text-center mt-4 fw-bold text-secondary">
                無資料符合
                <br>
                請選擇其他條件
            </p>

            <?php endif; ?>
        </div>
        <!-- 分頁 -->
        <div class="py-2">
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?php if($p==1 || $p==2)echo "disabled"?>">
                            <a class="page-link" aria-label="Previous" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                &p=1<?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php if($page_count>=3):?>
                        <?php if ($p == 1) : ?>

                        <li class="page-item <?php if($p == 1) echo "active"?>">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p+1 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p + 1 ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p+2 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p + 2 ?>
                            </a>
                        </li>

                        <?php elseif ($p + 1 <= $page_count) : ?>

                        <li class="page-item">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p-1 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p - 1 ?>
                            </a>
                        </li>
                        <li class="page-item  active">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p+1 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p + 1 ?>
                            </a>
                        </li>

                        <?php elseif ($p == $page_count) : ?>

                        <li class="page-item">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p-2 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p - 2 ?>
                            </a>
                        </li>
                        <li class="page-item  <?php if($p == ($page_count-1)) echo "active"?>">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p-1 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p - 1 ?>
                            </a>
                        </li>
                        <li class="page-item  <?php if($p == $page_count) echo "active"?>">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p ?>
                            </a>
                        </li>

                        <?php endif; ?>

                        <?php elseif($page_count==2):?>

                        <?php if($p==1):?>

                        <li class="page-item active">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p ?>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p+1 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p+1 ?>
                            </a>
                        </li>

                        <?php else:?>

                        <li class="page-item">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p-1 ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p-1 ?>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p ?>
                            </a>
                        </li>

                        <?php endif; ?>

                        <?php else:?>

                        <li class="page-item active">
                            <a class="page-link" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $p ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <?= $p ?>
                            </a>
                        </li>

                        <?php endif; ?>

                        <li class="page-item 
                                <?php if($p==$page_count || $p+1==$page_count) echo "disabled"?>">
                            <a class="page-link" aria-label="Next" href="../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>
                                    &p=<?= $page_count ?><?=$typeURL?><?=$dateURL?><?=$searchURL?><?=$perpageURL?>">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="py-2 text-center fw-bold text-secondary">
                第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    // 抓網頁上的 btns
    let deleteBtns = document.querySelectorAll(".delete-btn");
    let isdeleteBtns = document.querySelectorAll(".isdelete-btn");
    let validBtns = document.querySelectorAll(".valid-btn");

    // 用迴圈幫 btns 加上事件監聽
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

    // 下架 js
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

    // 刪除 js
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

    // 上架 js
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

    //select 選擇特定選項 option 的 js
    // $(function() {      
    //     $("#select").change(function() {
    //         var op = $("#select").find('option');

    //     });
    // });

    // 切換分頁的 js
    let pageCount = document.querySelector("#pageCount");
    pageCount.addEventListener("change", function(e) {
        location.href =
            `../goral_bike_layout/goral_biker_course-list.php?valid=<?=$valid?><?=$cateURL?>&p=1<?=$typeURL?><?=$dateURL?><?=$searchURL?>&per_page=${e.target.value}<?=$dateURL?>`;

    })

    //全選 js
    function CheckedAll() {
        var checkall = $('#checkall')[0].checked;
        $('input:checkbox.checkbox').each(function() {
            this.checked = checkall;
        });
    }

    //圖片即時預覽 js
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

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
</body>

</html>