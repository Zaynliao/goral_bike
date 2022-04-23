<?php
require_once("../db-connect.php");


$product_id = $_GET["product_id"];
$product_category_id = $_GET["product_category_id"];

$sql = "SELECT * FROM product,product_category WHERE `product`.`product_category_id`=`product_category`.`product_category_id` AND product.product_id='$product_id'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql = "SELECT * FROM product_category";
$category_result = $conn->query($sql);
$rows = $category_result->fetch_all(MYSQLI_ASSOC);

$conn->close();

?>
<div class="container">

    <div class="row">
        <div class="col-12 d-flex justify-content-end mt-3">
            <a href="goral_biker_product.php?product_category_id=<?= $row["product_category_id"] ?>" class="btn btn-outline-dark fst-6 text-center text-wrap" aria-current="page">
                返回
            </a>
        </div>

        <form class="row g-3 mt-1 justify-content-center align-items-center" name="insert" action="../product/goral_bike_php/product_update.php" method="post" enctype="multipart/form-data">

            <div class="card mb-3">
                <div class="row g-0">

                    <div class="col-md-4">
                        <img src="../product/goral_bike_pic/<?= $row["product_images"] ?>" class="img-fluid rounded-start" alt="<?= $row["product_name"] ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">更改商品名稱</h5>
                            <div class=" text-end">
                                <input type="text" name="product_name" id="product_name" value="<?= $row["product_name"] ?>" class=" form-control">
                            </div>
                            <div class="py-2 px-3">
                                <label for="product_price" class="form-label">商品價格 $</label>
                                <div class=" text-end">
                                    <input type="text" name="product_price" id="product_price" value="<?= $row["product_price"] ?>" class=" form-control">
                                </div>
                            </div>
                            <div class="py-2 px-3">
                                <label for="product_category_id" class="form-label">商品類別</label>
                                <select name="product_category_id" id="product_category_id" class="form-select">
                                    <?php foreach ($rows as $row_c) : ?>
                                        <?php if ($row_c["product_category_id"] == $product_category_id) : ?>
                                            <option selected value="<?= $row_c["product_category_id"] ?>">
                                                <?= $row_c["product_category_name"] ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?= $row_c["product_category_id"] ?>">
                                                <?= $row_c["product_category_name"] ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                                <button type="submit" class="btn btn-dark">修改商品</button>
                                <button type="reset" class="btn btn-outline-dark">重新填寫</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>