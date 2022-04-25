<?php
require_once("../db-connect.php");

// ------------------------------------------------------------------------------------------------
$path = $_SERVER["REQUEST_URI"];

// echo $path;
// // 透過路徑取得檔名
// $file = basename($path);
// // echo $file;

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
if (!isset($_GET["per_page"])) {
    $per_page = 8;
} else {
    $per_page = $_GET["per_page"];
}
if (!isset($_GET["date"])) {
    $date = "0000-00-00";
} else {
    $date = $_GET["date"];
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
$today = date('Y-m-d');
$searchQuery = "&date=$date&min_price=$min_price&max_price=$max_price&search=$search";
$searchDefault = "&date=2022-01-01&min_price=0&max_price=9999999999&search=";
// ------------------------------------------------------------------------------------------------

$valid = 1;
$sql_queryCount =  "SELECT accessory.*,accessory_category.accessory_category_name 
                    FROM accessory,accessory_category 
                    WHERE accessory.accessory_valid=$valid
                    AND accessory.accessory_category=accessory_category.id
                    AND accessory.accessory_up_date<='$today'
                    AND accessory.accessory_up_date BETWEEN '$date' AND '$today'
                    AND accessory.accessory_price BETWEEN '$min_price' AND '$max_price'
                    AND accessory.accessory_name LIKE '%$search%'
                    ";

// query列表資訊
if (!isset($_GET["accessory_category"])) {
    // query列表總數
    $sql_count = $sql_queryCount;
    $count_result = $conn->query($sql_count);
    // 計算分頁數量
    $total = $count_result->num_rows;
    $page_count = ceil($total / $per_page);
    $start = ($p - 1) * $per_page;
    // 所有商品，依分頁數量呈現
    $limit = "ORDER BY $order LIMIT $start,$per_page";
    $sql = $sql_count . $limit;
} else {
    $accessory_category = $_GET["accessory_category"];
    // query 列表總數
    $sql_count =  $sql_queryCount . " AND accessory.accessory_category='$accessory_category'";
    $count_result = $conn->query($sql_count);
    // 計算分頁數量
    $total = $count_result->num_rows;
    $page_count = ceil($total / $per_page);
    $start = ($p - 1) * $per_page;
    $limit = "ORDER BY $order LIMIT $start,$per_page";
    // 依據配件類別抓資料，依分頁數量呈現
    $sql = $sql_count . $limit;
}

$result = $conn->query($sql);
$accessory_count = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

// ------------------------------------------------------------------------------------------------
// query 出配件分類
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

                <a class="btn btn-outline-dark" href="goral_biker_accessory.php">全部商品</a>
                <?php foreach ($accessory_category_rows as $p_c_r) : ?>
                    <a class=" btn btn-outline-dark" href="goral_biker_accessory.php?accessory_category=<?= $p_c_r["id"] ?>&type=<?= $type ?>&per_page=<?= $per_page ?>"><?= $p_c_r["accessory_category_name"] ?></a>
                <?php endforeach; ?>

            </div>
            <?php $a = array("依商品ID正序排列", "依商品ID反序排列", "依名字正序排列", "依名字反序排列", "依價錢正序排列", "依價錢反序排列", "依日期正序排列", "依日期反序排列"); ?>

            <div class="d-flex justify-content-end mt-2 gap-3">
                <a class="btn btn-dark" data-bs-toggle="collapse" href="#insert" role="button" aria-expanded="false" aria-controls="insert">新增配件</a>
                <!-- 排序下拉式選單 -->
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- 排序方式選擇 -->
                        <?php
                        for ($i = 0; $i < count($a); $i++) {
                            if ($i == $type) {
                                echo $a[$i];
                            }
                        }
                        ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                        <?php if (strpos($file, "accessory_category") === false) : ?>
                            <?php for ($i = 0; $i < count($a); $i++) : ?>
                                <li>
                                    <a type="" class="dropdown-item" href="../goral_bike_layout/goral_biker_accessory.php?p=<?= $p ?>&type=<?= $i ?>&per_page=<?= $per_page ?><?= $searchQuery ?>"><?= $a[$i] ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 0; $i < count($a); $i++) : ?>
                                <li>
                                    <a type="button" class="dropdown-item" href="../goral_bike_layout/goral_biker_accessory.php?p=<?= $p ?>&accessory_category=<?= $accessory_category ?>&type=<?= $i ?>&per_page=<?= $per_page ?><?= $searchQuery ?>"><?= $a[$i] ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- 排序下拉式選單end -->
                <!-- 分頁下拉式選單 -->
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- 分頁選擇 -->
                        <?php
                        for ($i = 1; $i < 4 ; $i++) {
                            if ($i * 4 == $per_page) {
                                echo "每頁" . ($i * 4) . "筆";
                            }
                        }
                        ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                        <?php if (strpos($file, "accessory_category") === false) : ?>
                            <?php for ($i = 1; $i < 4; $i++) : ?>
                                <li>
                                    <a type="" class="dropdown-item" href="../goral_bike_layout/goral_biker_accessory.php?p=<?= $p ?>&type=<?= $type ?>&per_page=<?= $i * 4 ?><?= $searchQuery ?>">每頁<?= $i * 4 ?>筆
                                    </a>
                                </li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 1; $i < 4; $i++) : ?>
                                <li>
                                    <a type="" class="dropdown-item <?php if ($per_page == $i * 5) echo "active" ?>" href="../goral_bike_layout/goral_biker_accessory.php?p=<?= $p ?>&type=<?= $type ?>&accessory_category=<?= $accessory_category ?>&per_page=<?= $i * 4 ?><?= $searchQuery ?>">每頁<?= $i * 4 ?>筆
                                    </a>
                                </li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- 分頁下拉式選單end -->
            </div>
            <!-- 新增配件表單 -->
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="insert">
                        <div class="container">
                            <!-- 如果有圖的傳送要將enctype換成multipart/form-data -->
                            <form class="row g-3 mt-2" name="insert" action="../accessory/backend/accessory_insert.php" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="name" class="form-label d-block text-start">配件名稱</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="請輸入配件名稱">
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label d-block text-start">配件價格</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="請輸入配件價格">
                                </div>

                                <div class="col-8">
                                    <div class="mb-3">
                                        <label for="images" class="form-label d-block text-start">配件圖片</label>
                                        <input class="form-control" type="file" name="images" id="images" placeholder="請輸入配件圖片">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="up_date" class="form-label d-block text-start">上架日期</label>
                                    <input type="date" class="form-control" name="up_date" id="up_date">
                                </div>
                                <div class="col-md-4">
                                    <label for="category_id" class="form-label d-block text-start">配件類別</label>
                                    <select name="category" id="category" class="form-select">
                                        <?php foreach ($accessory_category_rows as $accessory_category_row) : ?>
                                            <option value="<?= $accessory_category_row["id"] ?>">
                                                <?= $accessory_category_row["accessory_category_name"] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label d-block text-start">配件規格</label>
                                    <input type="text" class="form-control" name="specification" id="specification" placeholder="請輸入配件規格">
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label d-block text-start">配件顏色</label>
                                    <input type="text" class="form-control" name="color" id="color" placeholder="請輸入配件顏色">
                                </div>
                                <div class="col-md-12">
                                    <label for="name" class="form-label d-block text-start">配件內容</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="請輸入配件內容">
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-2 mb-5">
                                    <button type="submit" class="btn btn-dark">送出</button>
                                    <button type="reset" class="btn btn-outline-dark">重新填寫</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 新增配件表單end -->
        </div>
    </div>

    <!-- 篩選 -->
    <div class="py-2">
        <p class="text-end">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter">
                篩選
            </button>
        </p>
        <div class="collapse" id="collapseFilter">
            <div class="card card-body">
                <form action="">
                    <?php if ($min_price <= $max_price && $date <= $today) : ?>
                        <div class="row justify-content-start align-items-center gx-2">
                            <h5 class="fw-bold mt-3">配件價格篩選</h5>
                            <?php if (isset($_GET["accessory_category"])) : ?>
                                <input type="hidden" name="accessory_category" id="accessory_category" value="<?= $accessory_category ?>">
                            <?php endif; ?>
                            <input type="hidden" name="p" id="p" value="<?= $p ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                            <input type="hidden" name="per_page" id="per_page" value="<?= $per_page ?>">
                            <div class="row mt-2">
                                <div class="col">
                                    <input type="number" class="form-control" value="<?= $min_price ?>" name="min_price" id="min_price" placeholder="min_price" aria-label="min_price">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" value="<?= $max_price ?>" name="max_price" id="max_price" placeholder="max_price" aria-label="max_price">
                                </div>
                            </div>
                            <h5 class="fw-bold mt-3">上架日期篩選</h5>
                            <div class="col-12 mt-2">
                                <input type="date" name="date" value="<?= $date ?>" class="form-control">
                            </div>
                            <h5 class="fw-bold mt-3">配件名稱篩選</h5>
                            <div class="col-12 my-2">
                                <input type="text" class="form-control" value="<?= $search ?>" name="search" id="search" placeholder="search" aria-label="search">
                            </div>
                            <div class="col-auto ms-auto mt-1">
                                <button type="submit" class="btn btn-secondary">查詢</button>
                                <button type="reset" class="btn btn-outline-secondary">重新填寫</button>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger d-flex align-items-center justify-content-center " role="alert">
                            （價格最小值不可大於最大值／上架日期選擇不可大於今天）
                            <a class="alert-link" href="../goral_bike_layout/goral_biker_accessory.php">請點選此處移除訊息
                            </a>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <!-- 篩選end -->
    <!-- 主列表 -->
    <div class="row">
        <h2 class="h2 mt-5">配件列表</h2>
        <p class="text-end">今日日期：<?= $today ?></p>
        <?php if ($accessory_count > 0) : ?>
            <?php foreach ($rows as $row) : ?>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card px-3">
                        <h1 class="h6 fw-bold mt-3 text-end">上架日期 : <?= $row["accessory_up_date"] ?>
                        </h1>
                        <figure class=" figure d-flex justify-content-center align-items-center" style="height: 280px;">
                            <img class="img-fluid" src="../accessory/image/<?= $row["accessory_category"] ?>/<?= $row["accessory_picture"] ?>" alt="">
                        </figure>
                        <div class="mb-3">
                            <span class="badge rounded-pill bg-danger" <?php if (!$row["accessory_category_name"]) : echo "hidden" ?> <?php endif; ?>>
                                <?= $row["accessory_category_name"] ?>
                            </span>
                            <span class="badge bg-dark rounded-pill" <?php if (!$row["accessory_price"]) : echo "hidden" ?> <?php endif; ?>>
                                $ <?= $row["accessory_price"] ?>
                            </span>
                        </div>
                        <h1 class="h4 fw-bold"><?= $row["accessory_name"] ?></h1>
                        <div class="py-2 d-grid">
                            <a class="delete-btn btn btn-dark text-white mb-2 fw-bold" href="../goral_bike_layout/goral_biker_accessory_update.php?accessory_id=<?= $row["id"] ?>&accessory_category=<?= $row["accessory_category"] ?>">更新資料</a>
                            <a class="delete-btn btn btn-secondary text-white mb-2 fw-bold" href="../accessory/backend/accessory_delete.php?accessory_id=<?= $row["id"] ?>">下架商品</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="alert alert-danger d-flex align-items-center  justify-content-center " role="alert">

                <div>
                    <h6>NO DATA!</h6>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- 主列表end -->
    <!-- 分頁 -->
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <?php if (strpos($file, "accessory_category") === false) : ?>
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="../goral_bike_layout/goral_biker_accessory.php?p=<?= $i ?>&type=<?= $type ?>&per_page=<?= $per_page ?><?= $searchQuery ?>"><?= $i ?></a></li>
                <?php endfor; ?>
            <?php else : ?>
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="../goral_bike_layout/goral_biker_accessory.php?p=<?= $i ?>&type=<?= $type ?>&per_page=<?= $per_page ?>&accessory_category=<?= $accessory_category ?><?= $searchQuery ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="py-2 text-center">
        第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
    </div>
    <!-- 分頁end -->
</div>