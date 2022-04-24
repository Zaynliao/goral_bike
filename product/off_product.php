<?php
require_once("../db-connect.php");

// ------------------------------------------------------------------------------------------------
$path = $_SERVER["REQUEST_URI"];

// echo $path;
// 透過路徑取得檔名
// $file = basename($path);
// echo $file;

$today = date('Y-m-d');
$a = array("依商品ID正序排列", "依商品ID反序排列", "依名字正序排列", "依名字反序排列", "依價錢正序排列", "依價錢反序排列", "依日期正序排列", "依日期反序排列");


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

$path_query_all = "../goral_bike_layout/goral_biker_off_product.php?date1=$date1&date2=$date2&min_price=$min_price&max_price=$max_price&search=$search";


if (!isset($_GET["product_category_id"])) {

    $product_category_id = "";

    $path_query = "../goral_bike_layout/goral_biker_off_product.php?date1=$date1&date2=$date2&min_price=$min_price&max_price=$max_price&search=$search";

    $path_query_error = "../goral_bike_layout/goral_biker_off_product.php?date1=&date2=$date2&search=$search&min_price=0&max_price=99999999";
} else {

    $product_category_id = $_GET["product_category_id"];

    $path_query = "../goral_bike_layout/goral_biker_off_product.php?date1=$date1&date2=$date2&min_price=$min_price&max_price=$max_price&search=$search&product_category_id=$product_category_id";

    $path_query_error = "../goral_bike_layout/goral_biker_off_product.php?date1=&date2=$date2&search=$search&min_price=0&max_price=99999999&product_category_id=$product_category_id";
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
    case "6":
        $order = "`product`.`product_update` ASC";
        break;
    case "7":
        $order = "`product`.`product_update` DESC";
        break;
    default:
        $order = "product.product_id ASC";
}


// ------------------------------------------------------------------------------------------------

$product_valid = 0;
$product_valid_Date = 1;

if (!isset($_GET["product_category_id"])) {

    $sql_conunt = "SELECT * FROM product,product_category 
    WHERE (product.valid='$product_valid' 
    AND product.product_category_id=product_category.product_category_id 
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%') 
    OR 
    (product.valid='$product_valid_Date' 
    AND product.product_category_id=product_category.product_category_id 
    AND `product`.`product_update` > '$today' 
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%')";
} else {

    $product_category_id = $_GET["product_category_id"];

    $sql_conunt = "SELECT * FROM product,product_category 
    WHERE (product.valid='$product_valid' 
    AND product.product_category_id=product_category.product_category_id 
    AND product.product_category_id='$product_category_id' 
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%')
    OR 
    (product.valid='$product_valid_Date' 
    AND product.product_category_id=product_category.product_category_id 
    AND product.product_category_id='$product_category_id' 
    AND`product`.`product_update` > '$today'
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%')";
}

$count_result = $conn->query($sql_conunt);

$total = $count_result->num_rows;

$count_rows = $count_result->fetch_all(MYSQLI_ASSOC);


$page_count = ceil($total / $per_page);
$start = ($p - 1) * $per_page;


// ------------------------------------------------------------------------------------------------


if (!isset($_GET["product_category_id"])) {

    $product_category_id = "";
    $sql = "SELECT * FROM product,product_category 
    WHERE (product.valid='$product_valid' 
    AND product.product_category_id=product_category.product_category_id
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%')  
    OR 
    (product.valid='$product_valid_Date' 
    AND product.product_category_id=product_category.product_category_id 
    AND `product`.`product_update` > '$today' 
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%') 
    ORDER BY $order 
    LIMIT $start,$per_page";
} else {

    $product_category_id = $_GET["product_category_id"];
    $sql = "SELECT * FROM product,product_category 
    WHERE (product.valid='$product_valid' 
    AND product.product_category_id=product_category.product_category_id 
    AND product.product_category_id='$product_category_id'
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%')  
    OR
    (product.valid='$product_valid_Date' 
    AND product.product_category_id=product_category.product_category_id 
    AND product.product_category_id='$product_category_id' 
    AND`product`.`product_update` > '$today' 
    AND `product`.`product_update` BETWEEN '$date1' AND '$date2' 
    AND `product`.`product_price` BETWEEN '$min_price' AND '$max_price' 
    AND `product`.`product_name` LIKE '%$search%') 
    ORDER BY $order 
    LIMIT $start,$per_page";
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

            <div>
                <a class="btn btn-dark"
                    href="<?= $path_query_all ?>&type=<?= $type ?>&p=<?= $p ?>&per_page=<?= $per_page ?>">所有商品</a>


                <?php foreach ($product_category_rows as $p_c_r) : ?>

                <a class="btn btn-dark"
                    href="../goral_bike_layout/goral_biker_off_product.php?product_category_id=<?= $p_c_r["product_category_id"] ?>"><?= $p_c_r["product_category_name"] ?></a>

                <?php endforeach; ?>
            </div>
            <div class="d-flex justify-content-end mt-4 gap-3">

                <select class="form-select w-25" aria-label="Default select example"
                    onchange="location.href=this.options[this.selectedIndex].value;">

                    <?php for ($i = 0; $i < count($a); $i++) : ?>

                    <option value="<?= $path_query ?>&type=<?= $i ?>&p=<?= $p ?>&per_page=<?= $per_page ?>"
                        <?php if ($type == $i) echo "selected" ?>><?= $a[$i] ?></option>

                    <?php endfor; ?>

                </select>




                <select class="form-select w-25" aria-label="Default select example"
                    onchange="location.href=this.options[this.selectedIndex].value;">

                    <?php for ($i = 1; $i <= 4; $i++) : ?>

                    <option value="<?= $path_query ?>&type=<?= $type ?>&p=<?= $p ?>&per_page=<?= $i * 4 ?>"
                        <?php if ($per_page == $i * 4) echo "selected" ?>>每頁<?= $i * 4 ?>筆</option>

                    <?php endfor; ?>

                </select>
            </div>
        </div>
    </div>

    <!-- 篩選 -->
    <div class="py-2">

        <p class="text-end">
            <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                篩選
            </button>
        </p>

        <div class="collapse show" id="collapseExample">
            <div class="card card-body">

                <form action="">
                    <?php if ($min_price <= $max_price && $date1 < $date2) : ?>
                    <div class="row justify-content-start align-items-center gx-2">
                        <h5 class="fw-bold mt-3">商品價格篩選</h5>

                        <input type="hidden" name="p" id="p" value="<?= $p ?>">
                        <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        <input type="hidden" name="product_category_id" id="product_category_id"
                            value="<?= $product_category_id ?>">

                        <div class="row mt-2">
                            <div class="col">
                                <input type="number" class="form-control" value="<?= $min_price ?>" name="min_price"
                                    id="min_price" placeholder="min_price" aria-label="min_price">
                            </div>

                            <div class="col">
                                <input type="number" class="form-control" value="<?= $max_price ?>" name="max_price"
                                    id="max_price" placeholder="max_price" aria-label="max_price">
                            </div>
                        </div>

                        <h5 class="fw-bold mt-3">上架日期篩選</h5>

                        <div class="col-6 mt-2">
                            <input type="date" name="date1" id="date1" value="<?= $date1 ?>" class="form-control">
                        </div>
                        <div class="col-6 mt-2">
                            <input type="date" name="date2" id="date2" value="<?= $date2 ?>" class="form-control">
                        </div>

                        <h5 class="fw-bold mt-3">商品名稱篩選</h5>

                        <div class="col my-2">
                            <input type="text" class="form-control" value="<?= $search ?>" name="search" id="search"
                                placeholder="search" aria-label="search">
                        </div>
                        <p></p>
                        <div class="col-auto ms-auto mt-1">
                            <button type="submit" class="btn btn-secondary">查詢</button>
                            <button type="reset" class="btn btn-outline-secondary">重新填寫</button>
                            <a href="goral_biker_off_product.php" class="btn btn-outline-secondary">清除篩選</a>
                        </div>
                    </div>
                    <?php else : ?>

                    <?php $date1 = "";
                        $date2 = "2022-12-31"; ?>
                    <div class="alert alert-danger d-flex align-items-center justify-content-center " role="alert">
                        （價格最小值不可大於最大值／日期區間最小值＞最大值）<a class="alert-link"
                            href="<?= $path_query_error ?>&type=<?= $type ?>&p=<?= $p ?>&per_page=<?= $per_page ?>">請點選此處移除訊息</a>
                    </div>
                    <?php endif; ?>
                </form>

            </div>
        </div>

    </div>


    <form action="../product/goral_bike_php/product_select_on_product.php" method="post">
        <div class="row mt-2">
            <div class="row justify-content-end align-items-center gap-3">
                <h2 class="h2 mt-5">下架商品列表</h2>
                <p class="text-end">今日日期：<?= $today ?></p>
                <input class="btn col-2 my-3 btn-outline-dark" type="button" value="全部選取" onclick="usel();">
                <button class="btn col-2 my-3 btn-dark" type="submit">批次商品上架</button>
                <button class="btn col-2 my-3 btn-danger" type="submit"
                    formaction="../product/goral_bike_php/product_select_DELETE_ALL.php">批次商品移除</button>
            </div>
            <?php if ($product_count > 0) : ?>
            <?php foreach ($rows as $row) : ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">

                <div class="card px-3">

                    <div class="form-check">
                        <input class="form-check-input mt-3" type="checkbox" value="<?= $row["product_id"] ?>"
                            name="check[]" id="check">
                        <?php if ($row["product_update"] > $today) : ?>
                        <h1 class="h6 fw-bold mt-3 text-end">預計上架日期 : <?= $row["product_update"] ?></h1>
                        <?php else : ?>
                        <h1 class="h6 fw-bold mt-3 text-end">上架日期 : <?= $row["product_update"] ?></h1>
                        <?php endif; ?>
                    </div>
                    <figure class=" figure d-flex justify-content-center align-items-center" style="height: 280px;">

                        <img class="img-fluid" src="../product/goral_bike_pic/<?= $row["product_images"] ?>" alt="">

                    </figure>

                    <div class="mb-3 ">
                        <span class="badge rounded-pill bg-danger"
                            <?php if (!$row["product_category_name"]) : echo "hidden" ?> <?php endif; ?>>
                            <?= $row["product_category_name"] ?>
                        </span>
                        <span class="badge bg-dark rounded-pill" <?php if (!$row["product_price"]) : echo "hidden" ?>
                            <?php endif; ?>>
                            $ <?= $row["product_price"] ?>
                        </span>
                    </div>

                    <h1 class="h4 fw-bold my-3 text-center"><?= $row["product_name"] ?></h1>
                    <div class="py-2 d-grid">
                        <a class="delete-btn btn btn-dark text-white mb-2 fw-bold"
                            href="../goral_bike_layout/goral_biker_update.php?product_id=<?= $row["product_id"] ?>&product_category_id=<?= $row["product_category_id"] ?>">更新資料</a>
                        <a class="delete-btn btn btn-info text-white mb-2 fw-bold"
                            href="../product/goral_bike_php/product_on_product.php?product_id=<?= $row["product_id"] ?>">上架商品</a>
                        <a class="delete-btn btn btn-danger text-white mb-2 fw-bold"
                            href="../product/goral_bike_php/product_DELETE_ALL.php?product_id=<?= $row["product_id"] ?>">刪除商品</a>
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
    </form>

    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">

            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
            <li class="page-item <?php if ($i == $p) echo "active" ?>">
                <a class="page-link"
                    href="<?= $path_query ?>&type=<?= $type ?>&p=<?= $i ?>&per_page=<?= $per_page ?>"><?= $i ?></a>
            </li>
            <?php endfor; ?>


        </ul>
    </nav>

    <div class="py-2 text-center">
        第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
    </div>

    <script type="text/javascript">
    function usel() {
        //變數checkItem為checkbox的集合
        var checkItem = document.getElementsByName("check[]");
        for (var i = 0; i < checkItem.length; i++) {
            checkItem[i].checked = !checkItem[i].checked;
        }
    }
    </script>