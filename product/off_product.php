<?php
require_once("../db-connect.php");

$product_valid = 0;

if (!isset($_GET["product_category_id"])) {

    $sql = "SELECT * FROM product,product_category WHERE product.valid='$product_valid' AND product.product_category_id=product_category.product_category_id ORDER BY product.product_id DESC";
} else {

    $product_category_id = $_GET["product_category_id"];
    $sql = "SELECT * FROM product,product_category WHERE product.valid='$product_valid' AND product.product_category_id=product_category.product_category_id AND product.product_category_id='$product_category_id' ORDER BY product.product_id DESC";
}





$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
// echo json_encode($rows);
$conn->close();

?>
<div class="container my-5">

    <div class="col-12 d-flex justify-content-end gap-2 mb-5">
        <!-- <button id="btn_Insert" type="submit" class="btn btn-primary">
            <a href="goral_biker_Insert.php" class=" text-decoration-none fst-6 text-center text-wrap text-white">
                新增商品
            </a>
        </button> -->

    </div>
    <div class="row">

        <?php foreach ($rows as $row) : ?>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">

                <div class="card px-3">


                    <figure class=" figure d-flex justify-content-center align-items-center" style="height: 240px;">
                        <img class="img-fluid" src="../product/goral_bike_pic/<?= $row["product_images"] ?>" alt="">
                    </figure>
                    <div class="mb-3">
                    <span class="badge bg-dark rounded-pill" <?php if (!$row["product_price"]) : echo "hidden"?>
                        <?php endif; ?>>
                        $ <?= $row["product_price"] ?>
                    </span>
                    <span class="badge bg-dark rounded-pill" <?php if (!$row["product_category_name"]) : echo "hidden"?>
                        <?php endif; ?>>
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
</div>