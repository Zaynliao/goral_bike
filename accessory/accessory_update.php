<!-- DONE -->
<?php
require_once("../db-connect.php");


$id = $_GET["accessory_id"];
$accessory_category = $_GET["accessory_category"];

$sql = "SELECT accessory.*,accessory_category.accessory_category_name
        FROM accessory,accessory_category 
        WHERE accessory.id='$id'
        AND accessory.accessory_category=accessory_category.id
        ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql = "SELECT * FROM accessory_category";
$category_result = $conn->query($sql);
$rows = $category_result->fetch_all(MYSQLI_ASSOC);

$conn->close();

?>
<div class="container">

    <div class="d-flex justify-content-end mt-3">
        <a href="javascript:location.href = document.referrer;" class="btn btn-outline-dark fst-6 text-center text-wrap" aria-current="page">
            返回
        </a>
    </div>

    <form class="row g-3 mt-1 justify-content-center align-items-center" name="insert" action="../accessory/backend/accessory_update.php" method="post" enctype="multipart/form-data">

        <div class="col-8 mb-4">
            <input type="hidden" name="id" id="id" value="<?= $row["id"] ?>">
            <div class="card p-3 py-4">
                <div class="py-2 px-3">
                    <h3 for="accessory_img" class="form-label text-center fw-bolder">配件圖片</h3>
                </div>

                <figure class="figure d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="../accessory/image/<?= $row["accessory_category"] ?>/<?= $row["accessory_picture"] ?>" alt="">
                </figure>

                <div class="py-2 px-3">
                    <label for="name" class="form-label">配件名稱</label>
                    <div class=" text-end">
                        <input type="text" name="name" id="name" value="<?= $row["accessory_name"] ?>" class=" form-control">
                    </div>
                </div>

                <div class="py-2 px-3">
                    <label for="up_date" class="form-label">更改配件上架日期</label>
                    <input class="form-control" type="date" name="up_date" id="up_date" value="<?= $row["accessory_up_date"] ?>">
                </div>

                <div class="py-2 px-3">

                    <label for="price" class="form-label">配件價格 $</label>
                    <div class=" text-end">
                        <input type="text" name="price" id="price" value="<?= $row["accessory_price"] ?>" class=" form-control">
                    </div>
                </div>

                <div class="py-2 px-3">
                    <label for="accessory_category" class="form-label">配件類別</label>
                    <select name="accessory_category" id="accessory_category" class="form-select">

                        <?php foreach ($rows as $row_c) : ?>
                            <?php if ($row_c["id"] == $accessory_category) : ?>
                                <option selected value="<?= $row_c["id"] ?>">
                                    <?= $row_c["accessory_category_name"] ?>
                                </option>
                            <?php else : ?>
                                <option value="<?= $row_c["id"] ?>">
                                    <?= $row_c["accessory_category_name"] ?>
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



    </form>
</div>