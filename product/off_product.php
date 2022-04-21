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

// ------type = ?↓
switch ($type) {
    case "0":
        // 動態字串型變數
        $order = "product.product_id ASC";
        break;
    case "1":
        $order = "product.product_id DESC";
        break;
    case "2":
        $order = "product.product_name ASC";
        break;
    case "3":
        $order = "product.product_name DESC";
        break;
    case "4":
        $order = "product.product_price ASC";
        break;
    case "5":
        $order = "product.product_price DESC";
        break;
    default:
        $order = "product.product_id ASC";
}

// ------------------------------------------------------------------------------------------------

$product_valid = 0;

if (!isset($_GET["product_category_id"])) {

    $sql_conunt = "SELECT * FROM product,product_category WHERE product.valid='$product_valid' AND product.product_category_id=product_category.product_category_id";
} else {

    $product_category_id = $_GET["product_category_id"];

    $sql_conunt = "SELECT * FROM product,product_category WHERE product.valid='$product_valid' AND product.product_category_id=product_category.product_category_id AND product.product_category_id='$product_category_id'";
}

$count_result = $conn->query($sql_conunt);

$total = $count_result->num_rows;

$count_rows = $count_result->fetch_all(MYSQLI_ASSOC);

$per_page = 8;
$page_count = ceil($total / $per_page);
$start = ($p - 1) * $per_page;


// ------------------------------------------------------------------------------------------------


if (!isset($_GET["product_category_id"])) {

    $sql = "SELECT * FROM product,product_category WHERE product.valid='$product_valid' AND product.product_category_id=product_category.product_category_id ORDER BY $order LIMIT $start,$per_page";
} else {

    $product_category_id = $_GET["product_category_id"];
    $sql = "SELECT * FROM product,product_category WHERE product.valid='$product_valid' AND product.product_category_id=product_category.product_category_id AND product.product_category_id='$product_category_id' ORDER BY $order LIMIT $start,$per_page";
}


$result = $conn->query($sql);

$product_count = $result->num_rows;

$rows = $result->fetch_all(MYSQLI_ASSOC);

// ------------------------------------------------------------------------------------------------



$sql = "SELECT * FROM product_category";
$product_category_result = $conn->query($sql);
$product_category_rows = $product_category_result->fetch_all(MYSQLI_ASSOC);


// var_dump($rows);
// echo json_encode($rows);
$conn->close();

?>
<div class="container my-5">

    <div class="row justify-content-end">
        <div class="py-2 text-end ">

            <?php $a = array("依正序排列", "依反序排列", "依名字正序排列", "依名字反序排列", "依價錢正序排列", "依價錢反序排列"); ?>



            <div class="d-flex justify-content-end mt-2 gap-3">


                <select class="form-select" aria-label="Default select example">

                    <?php if (strpos($file, "product_category_id") === false) : ?>
                        <?php for ($i = 0; $i < count($a); $i++) : ?>
                            <option><a type="" class="dropdown-item <?php if ($type == $i) echo "selected" ?>" href="../goral_bike_layout/goral_biker_off_product.php?p=<?= $p ?>&type=<?= $i ?>"><?= $a[$i] ?></a>
                            </option>
                        <?php endfor; ?>
                    <?php else : ?>
                        <?php for ($i = 0; $i < count($a); $i++) : ?>
                            <option><a type="button" class="dropdown-item <?php if ($type == $i) echo "selected" ?>" href="../goral_bike_layout/goral_biker_off_product.php?p=<?= $p ?>&product_category_id=<?= $product_category_id ?>&type=<?= $i ?>"><?= $a[$i] ?></a>
                            </option>
                        <?php endfor; ?>
                    <?php endif; ?>

                </select>







            </div>

        </div>
    </div>

    <!-- 時間篩選 -->
    <div class="py-2">
        <form action="">
            <div class="row justify-content-end gx-2">
                <div class="col-auto">
                    <input type="date" name="date1" <?php if (isset($_GET["date1"])) : ?> value="<?= $_GET["date1"] ?>" <?php endif; ?> class="form-control">
                </div>
                <div class="col-auto">
                    <label class="form-control-label" for="">~</label>
                </div>
                <div class="col-auto">
                    <input type="date" name="date2" <?php if (isset($_GET["date2"])) : ?> value="<?= $_GET["date2"] ?>" <?php endif; ?> class="form-control">
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-secondary">查詢</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">

        <?php foreach ($rows as $row) : ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">

                <div class="card px-3">


                    <figure class=" figure d-flex justify-content-center align-items-center" style="height: 240px;">
                        <img class="img-fluid" src="../product/goral_bike_pic/<?= $row["product_images"] ?>" alt="">
                    </figure>
                    <div class="mb-3">
                        <span class="badge bg-dark rounded-pill" <?php if (!$row["product_price"]) : echo "hidden" ?> <?php endif; ?>>
                            $ <?= $row["product_price"] ?>
                        </span>
                        <span class="badge bg-dark rounded-pill" <?php if (!$row["product_category_name"]) : echo "hidden" ?> <?php endif; ?>>
                            <?= $row["product_category_name"] ?>
                        </span>
                    </div>
                    <h1 class="h4 fw-bold"><?= $row["product_name"] ?></h1>
                    <div class="py-2 d-grid">
                        <a class="delete-btn btn btn-dark text-white mb-2 fw-bold" href="../goral_bike_layout/goral_biker_update.php?product_id=<?= $row["product_id"] ?>&product_category_id=<?= $row["product_category_id"] ?>">更新資料</a>
                        <a class="delete-btn btn btn-info text-white mb-2 fw-bold" href="../product/goral_bike_php/product_on_product.php?product_id=<?= $row["product_id"] ?>">上架商品</a>
                        <a class="delete-btn btn btn-danger text-white mb-2 fw-bold" href="../product/goral_bike_php/product_DELETE_ALL.php?product_id=<?= $row["product_id"] ?>">刪除商品</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item ">
                <a class="page-link text-dark" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>



            <?php if (strpos($file, "product_category_id") === false) : ?>
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link text-dark" href="../goral_bike_layout/goral_biker_product.php?p=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
                <?php endfor; ?>
            <?php else : ?>
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link text-dark" href="../goral_bike_layout/goral_biker_product.php?p=<?= $i ?>&type=<?= $type ?>&product_category_id=<?= $product_category_id ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            <?php endif; ?>



            <li class="page-item">
                <a class="page-link text-dark" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="py-2 text-center">
        第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
    </div>
</div>