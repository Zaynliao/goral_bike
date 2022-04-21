<?php
require_once("../db-connect.php");
$sql = "SELECT * FROM product_category";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<div class="container">

    <div class="col-12 d-flex justify-content-end mt-5">
        <a href="goral_biker_home.php" class="btn btn-info fst-6 text-center text-wrap text-white" aria-current="page">
            返回
        </a>
    </div>

    <form class="row g-3 mt-2" name="insert" action="../goral_bike_php/product_insert.php" method="post" enctype="multipart/form-data">

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

        <div class="col-md-4">
            <label for="product_category_id" class="form-label">商品類別</label>
            <select name="product_category_id" id="product_category_id" class="form-select">
                <?php foreach ($rows as $row) : ?>
                    <option value="<?= $row["product_category_id"] ?>">
                        <?= $row["product_category_name"] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12 d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">新增商品</button>
            <button type="reset" class="btn btn-primary">重新填寫</button>
        </div>

    </form>
</div>