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

$product_valid = 1;

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
                <a class="btn btn-dark" data-bs-toggle="collapse" href="#insert" role="button" aria-expanded="false" aria-controls="insert">新增商品</a>


                <select class="form-select w-25" aria-label="Default select example" onchange="location.href=this.options[this.selectedIndex].value;">

                    <?php if (strpos($file, "product_category_id") === false) : ?>
                        <?php for ($i = 0; $i < count($a); $i++) : ?>

                            <option value="../goral_bike_layout/goral_biker_product.php?p=<?= $p ?>&type=<?= $i ?>" <?php if ($type == $i) echo "selected" ?>><?= $a[$i] ?></option>

                            </option>
                        <?php endfor; ?>
                    <?php else : ?>
                        <?php for ($i = 0; $i < count($a); $i++) : ?>

                            <option value="../goral_bike_layout/goral_biker_product.php?p=<?= $p ?>&type=<?= $i ?>&product_category_id=<?= $product_category_id ?>" <?php if ($type == $i) echo "selected" ?>><?= $a[$i] ?></option>

                            </option>
                        <?php endfor; ?>
                    <?php endif; ?>

                </select>

            </div>

            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse" id="insert">
                        <div class="container">

                            <form class="row g-3 mt-2" name="insert" action="../product/goral_bike_php/product_insert.php" method="post" enctype="multipart/form-data">

                                <div class="col-md-6">
                                    <label for="product_name" class="form-label">商品名稱</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="請輸入商品名稱">
                                </div>

                                <div class="col-md-6">
                                    <label for="product_price" class="form-label">商品價格</label>
                                    <input type="text" class="form-control" name="product_price" id="product_price" placeholder="請輸入商品價格">
                                </div>

                                <div class="col-8">
                                    <div class="mb-3">
                                        <label for="product_images" class="form-label">商品圖片</label>
                                        <input class="form-control" type="file" name="product_images" id="product_images" placeholder="請輸入商品圖片">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="product_update" class="form-label">上架日期</label>
                                    <input type="date" class="form-control" name="product_update" id="product_update">
                                </div>

                                <div class="col-md-4">
                                    <label for="product_category_id" class="form-label">商品類別</label>
                                    <select name="product_category_id" id="product_category_id" class="form-select">
                                        <?php foreach ($product_category_rows as $product_category_row) : ?>
                                            <option value="<?= $product_category_row["product_category_id"] ?>">
                                                <?= $product_category_row["product_category_name"] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-12 d-flex justify-content-end gap-2 mb-5">
                                    <button type="submit" class="btn btn-dark">新增商品</button>
                                    <button type="reset" class="btn btn-outline-dark">重新填寫</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

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
        <h2 class="h2">商品列表</h2>
        <?php if ($product_count > 0) : ?>
            <?php foreach ($rows as $row) : ?>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                    <div class="card px-3">
                        <h1 class="h6 fw-bold mt-3 text-end">上架日期 : <?= $row["product_update"] ?></h1>
                        <figure class=" figure d-flex justify-content-center align-items-center" style="height: 280px;">

                            <img class="img-fluid" src="../product/goral_bike_pic/<?= $row["product_images"] ?>" alt="">

                        </figure>

                        <div class="mb-3 ">
                            <span class="badge rounded-pill bg-danger" <?php if (!$row["product_category_name"]) : echo "hidden" ?> <?php endif; ?>>
                                <?= $row["product_category_name"] ?>
                            </span>
                            <span class="badge bg-dark rounded-pill" <?php if (!$row["product_price"]) : echo "hidden" ?> <?php endif; ?>>
                                $ <?= $row["product_price"] ?>
                            </span>
                        </div>

                        <h1 class="h4 fw-bold my-3 text-center"><?= $row["product_name"] ?></h1>


                        <div class="py-2 d-grid">
                            <a class="delete-btn btn btn-dark text-white mb-2 fw-bold" href="../goral_bike_layout/goral_biker_update.php?product_id=<?= $row["product_id"] ?>&product_category_id=<?= $row["product_category_id"] ?>">更新資料</a>
                            <a class="delete-btn btn btn-secondary text-white mb-2 fw-bold" href="../product/goral_bike_php/product_delete.php?product_id=<?= $row["product_id"] ?>">下架商品</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
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