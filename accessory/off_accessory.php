<!-- DONE -->
<?php
require_once("../db-connect.php");

// ------------------------------------------------------------------------------------------------
$path = $_SERVER["REQUEST_URI"];

// echo $path;
// 透過路徑取得檔名
// $file = basename($path);
// echo $file;
$today = date('Y-m-d');

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

if (!isset($_GET["type"])) {
    $type = 0;
} else {
    $type = $_GET["type"];
}

if (!isset($_GET["date1"])) {
    $date1 = "0000-00-00";
} else {
    $date1 = $_GET["date1"];
}
if (!isset($_GET["date2"])) {
    $date2 = "2022-12-31";
} else {
    $date2 = $_GET["date2"];
}
if (!isset($_GET["min_price"])) {
    $min_price = 0;
} else {
    $min_price = $_GET["min_price"];
}

if (!isset($_GET["max_price"])) {
    $max_price = 9999999999;
} else {
    $max_price = $_GET["max_price"];
}

if (!isset($_GET["search"])) {
    $search = "";
} else {
    $search = $_GET["search"];
}

// ------type = ?↓
switch ($type) {
    case "0":
        // 動態字串型變數
        $order = "accessory.id ASC";
        break;
    case "1":
        $order = "accessory.id DESC";
        break;
    case "2":
        $order = "accessory.accessory_name ASC";
        break;
    case "3":
        $order = "accessory.accessory_name DESC";
        break;
    case "4":
        $order = "accessory.accessory_price ASC";
        break;
    case "5":
        $order = "accessory.accessory_price DESC";
        break;
    case "6":
        $order = "accessory.accessory_up_date ASC";
        break;
    case "7":
        $order = "accessory.accessory_up_date DESC";
        break;
    default:
        $order = "accessory.id ASC";
}

// if (!isset($_GET["accessory_category"])){
    $path_query="min_price=$min_price&max_price=$max_price&date1=$date1&date2=$date2&search=$search";


// }

// ------------------------------------------------------------------------------------------------

$accessory_valid = 0;
$accessory_valid_Date = 1;
// 計算分頁數量跟總筆數
if (!isset($_GET["accessory_category"])) {
    $sql_count = "  SELECT accessory.*,accessory_category.accessory_category_name 
                    FROM accessory,accessory_category 
                    WHERE (accessory.accessory_valid='$accessory_valid' 
                    AND accessory.accessory_category=accessory_category.id   
                    AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
                    AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
                    AND accessory.accessory_name LIKE '%$search%') 
                    OR (accessory.accessory_valid='$accessory_valid_Date'
                    AND accessory.accessory_up_date > '$today'
                    AND accessory.accessory_category=accessory_category.id  
                    AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
                    AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
                    AND accessory.accessory_name LIKE '%$search%') 
                    ";
} else {

    $category = $_GET["accessory_category"];
    $sql_count = "  SELECT accessory.*,accessory_category.accessory_category_name 
                    FROM accessory,accessory_category 
                    WHERE (accessory.accessory_valid='$accessory_valid'
                    AND accessory.accessory_category=accessory_category.id   
                    AND accessory.accessory_category= '$category'   
                    AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
                    AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
                    AND accessory.accessory_name LIKE '%$search%') 
                    OR (accessory.accessory_valid='$accessory_valid_Date'
                    AND accessory.accessory_up_date > '$today'
                    AND accessory.accessory_category=accessory_category.id   
                    AND accessory.accessory_category='$category'  
                    AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
                    AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
                    AND accessory.accessory_name LIKE '%$search%') 
                    ";
}

$count_result = $conn->query($sql_count);
$total = $count_result->num_rows;  // 計算資料數

$per_page = 8;
$page_count = ceil($total / $per_page); // 總頁數
$start = ($p - 1) * $per_page; // 分頁起始筆數


// ------------------------------------------------------------------------------------------------

// select 每個分頁要呈現的accessory列表
if (!isset($_GET["accessory_category"])) {

    $sql = "SELECT accessory.*,accessory_category.accessory_category_name 
            FROM accessory,accessory_category 
            WHERE (accessory.accessory_valid='$accessory_valid' 
            AND accessory.accessory_category=accessory_category.id   
            AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
            AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
            AND accessory.accessory_name LIKE '%$search%') 
            OR (accessory.accessory_valid='$accessory_valid_Date'
            AND accessory.accessory_up_date > '$today'
            AND accessory.accessory_category=accessory_category.id  
            AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
            AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
            AND accessory.accessory_name LIKE '%$search%') 
            ORDER BY $order 
            LIMIT $start,$per_page";
} else {

    $category = $_GET["accessory_category"];
    $sql = "SELECT accessory.*,accessory_category.accessory_category_name 
            FROM accessory,accessory_category 
            WHERE (accessory.accessory_valid='$accessory_valid'
            AND accessory.accessory_category=accessory_category.id   
            AND accessory.accessory_category= '$category'   
            AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
            AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
            AND accessory.accessory_name LIKE '%$search%') 
            OR (accessory.accessory_valid='$accessory_valid_Date'
            AND accessory.accessory_up_date > '$today'
            AND accessory.accessory_category=accessory_category.id   
            AND accessory.accessory_category='$category'  
            AND accessory.accessory_up_date BETWEEN '$date1' AND '$date2' 
            AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price' 
            AND accessory.accessory_name LIKE '%$search%') 
            ORDER BY $order 
            LIMIT $start,$per_page";
}


$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC); // query成陣列

// ------------------------------------------------------------------------------------------------

$sql = "SELECT * FROM accessory_category";
$accessory_category_result = $conn->query($sql);
$accessory_category_rows = $accessory_category_result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
// echo json_encode($rows);
$conn->close();




?>
<div class="container my-5">
    <div class="row justify-content-end">
        <div class="py-2 text-end ">
            <div class="py-2 text-end">

                <a class="btn btn-outline-dark" href="goral_biker_off_accessory.php">全部商品</a>
                    <?php foreach ($accessory_category_rows as $p_c_r) : ?>
                        <a class=" btn btn-outline-dark" href="goral_biker_off_accessory.php?accessory_category=<?= $p_c_r["id"]?>&type=<?= $type ?>&<?=$path_query ?>"><?= $p_c_r["accessory_category_name"] ?></a>
                    <?php endforeach; ?>

            </div>

            <?php $a = array("依商品ID正序排列", "依商品ID反序排列", "依名字正序排列", "依名字反序排列", "依價錢正序排列", "依價錢反序排列", "依日期正序排列", "依日期反序排列"); ?>

            <div class="d-flex justify-content-end mt-2 gap-3">

                <select class="form-select w-25" aria-label="Default select example" onchange="location.href=this.options[this.selectedIndex].value;">
                <?php if (!isset($_GET["accessory_category"])): ?>
                    <?php for ($i = 0; $i < count($a); $i++) : ?>
                        <option value="goral_biker_off_accessory.php?type=<?= $i ?>&<?=$path_query ?>" <?php if ($type == $i) echo "selected" ?>><?= $a[$i] ?></option>
                    <?php endfor; ?>
                <?php else: ?>
                    <?php for ($i = 0; $i < count($a); $i++) : ?>
                        <option value="goral_biker_off_accessory.php?accessory_category=<?= $category ?>&type=<?= $i ?>&<?=$path_query ?>" <?php if ($type == $i) echo "selected" ?>><?= $a[$i] ?></option>
                    <?php endfor; ?>
                <?php endif; ?>
                </select>
            </div>
        </div>
    </div>

    <!-- 篩選 -->
    <div class="py-2">

        <p class="text-end">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                篩選
            </button>
        </p>

        <div class="collapse" id="collapseExample">
            <div class="card card-body">

                <form action="">
                    <?php if ($min_price <= $max_price) : ?>
                        <div class="row justify-content-start align-items-center gx-2">
                            <h5 class="fw-bold mt-3">配件價格篩選</h5>

                            <input type="hidden" name="p" id="p" value="<?= $p ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                            <?php if (isset($_GET["accessory_category"])): ?>
                                <input type="hidden" name="accessory_category" id="accessory_category" value="<?= $category ?>">
                            <?php endif; ?>
                            <div class="row mt-2">
                                <div class="col">
                                    <input type="number" class="form-control" value="<?= $min_price ?>" name="min_price" id="min_price" placeholder="min_price" aria-label="min_price">
                                </div>

                                <div class="col">
                                    <input type="number" class="form-control" value="<?= $max_price ?>" name="max_price" id="max_price" placeholder="max_price" aria-label="max_price">
                                </div>
                            </div>

                            <h5 class="fw-bold mt-3">上架日期篩選</h5>

                            <div class="col-6 mt-2">
                                <input type="date" name="date1" id="date1" value="<?= $date1 ?>" class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                                <input type="date" name="date2" id="date2" value="<?= $date2 ?>" class="form-control">
                            </div>

                            <h5 class="fw-bold mt-3">配件名稱篩選</h5>

                            <div class="col my-2">
                                <input type="text" class="form-control" value="<?= $search ?>" name="search" id="search" placeholder="search" aria-label="search">
                            </div>
                            <p></p>
                            <div class="col-auto ms-auto mt-1">
                                <button type="submit" class="btn btn-secondary">查詢</button>
                                <button type="reset" class="btn btn-outline-secondary">重新填寫</button>
                            <?php if (!isset($_GET["accessory_category"])): ?>
                                <a href="goral_biker_off_accessory.php" class="btn btn-outline-danger">清除篩選</a>
                            <?php else: ?>
                                <a href="goral_biker_off_accessory.php?accessory_category=<?= $category?>&min_price=0&max_price=9999999999&date1=0000-00-00&date2=2050-12-31&search=" class="btn btn-outline-danger">清除篩選</a>
                            <?php endif;?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger d-flex align-items-center justify-content-center " role="alert">
                            價格最小值錯誤，<a class="alert-link" href="goral_biker_off_accessory.php">請點選此處移除訊息</a>
                        </div>
                    <?php endif; ?>
                </form>

            </div>
        </div>

    </div>

    <div class="row">
        <h2 class="h2">下架商品列表</h2>
        <p class="text-end">今日日期：<?= $today ?></p>
        <?php foreach ($rows as $row) : ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">

                <div class="card px-3">
                    <h1 class="h6 fw-bold mt-3 text-end">上架日期 : <?= $row["accessory_up_date"] ?></h1>
                    <figure class=" figure d-flex justify-content-center align-items-center" style="height: 280px;">

                        <img class="img-fluid" src="../accessory/image/<?= $row["accessory_category"] ?>/<?= $row["accessory_picture"] ?>" alt="">

                    </figure>

                    <div class="mb-3 ">
                        <span class="badge rounded-pill bg-danger" <?php if (!$row["accessory_category_name"]) : echo "hidden" ?> <?php endif; ?>>
                            <?= $row["accessory_category_name"] ?>
                        </span>
                        <span class="badge bg-dark rounded-pill" <?php if (!$row["accessory_price"]) : echo "hidden" ?> <?php endif; ?>>
                            $ <?= $row["accessory_price"] ?>
                        </span>
                    </div>

                    <h1 class="h4 fw-bold my-3 text-center"><?= $row["accessory_name"] ?></h1>
                    <div class="py-2 d-grid">
                        <a class="delete-btn btn btn-dark text-white mb-2 fw-bold" href="../goral_bike_layout/goral_biker_accessory_update.php?accessory_id=<?= $row["id"] ?>&accessory_category=<?= $row["accessory_category"] ?>">更新資料</a>
                        <a class="delete-btn btn btn-info text-white mb-2 fw-bold" href="../accessory/backend/accessory_on.php?accessory_id=<?= $row["id"] ?>">上架商品</a>
                        <a class="delete-btn btn btn-danger text-white mb-2 fw-bold" href="../accessory/backend/accessory_DELETE_ALL.php?accessory_id=<?= $row["id"] ?>">刪除商品</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="../goral_bike_layout/goral_biker_off_accessory.php?p=<?= $p ?>&accessory_category=<?= $category ?>&type=<?= $type ?>&<?= $path_query ?>"><?= $i ?></a></li>
                <?php endfor; ?>
        </ul>
    </nav>

    <div class="py-2 text-center">
        第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
    </div>
</div>