<?php
require_once("../db-connect.php");


$order_id = $_GET["order_id"];
// $product_category_id = $_GET["product_category_id"];

$sql = "SELECT * FROM order_list WHERE order_list.order_id='$order_id'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

// $sql = "SELECT * FROM product_category";
// $category_result = $conn->query($sql);
// $rows = $category_result->fetch_all(MYSQLI_ASSOC);

$conn->close();

?>
<div class="container">

    <div class="col-12 d-flex justify-content-end mt-3">
        <a href="goral_biker_order_list.php" class="btn btn-outline-dark fst-6 text-center text-wrap" aria-current="page">
            返回
        </a>
    </div>

    <form class="row g-3 mt-1 justify-content-center align-items-center" name="insert" action="../goral_bike_php/order_list_edit.php" method="post">

        <div class="col-8 mb-4">


            <input type="hidden" name="order_id" id="order_id" value="<?= $row["order_id"] ?>" class=" form-control">

            <div class="card p-2">

                <div class="py-2 px-3">
                    <label for="order_adress" class="form-label">order_id : <?= $row["order_id"] ?></label>
                    <div class=" text-end">
                        <h1 name="order_id" id="order_id" class="h1">
                    </div>
                </div>

                <div class="py-2 px-3">
                    <label for="order_adress" class="form-label">order_adress</label>
                    <div class=" text-end">
                        <input type="text" name="order_address" id="order_address" value="<?= $row["order_address"] ?>" class=" form-control">
                    </div>
                </div>

                <div class="py-2 px-3">
                    <label for="totoal_amount" class="form-label">total_amount</label>
                    <div class=" text-end">
                        <input type="text" name="total_amount" id="total_amount" value="<?= $row["total_amount"] ?>" class=" form-control">
                    </div>
                </div>

                <div class="py-2 px-3">

                    <label for="order_status" class="form-label">order_status</label>
                    <div class=" text-end">
                        <input type="text" name="order_status" id="order_status" value="<?= $row["order_status"] ?>" class=" form-control">
                    </div>
                </div>

                <div class="py-2 px-3">

                    <label for="order_status" class="form-label">order_status</label>
                    <div class=" text-end">
                        <input type="text" name="order_status" id="order_status" value="<?= $row["order_status"] ?>" class=" form-control">
                    </div>
                </div>

                <!-- <div class="py-2 px-3">

                    <label for="order_create_time" class="form-label">時間</label>
                    <div class=" text-end">
                        <input type="date" name="order_create_time" id="order_create_time" value="<?= $row["order_create_time"] ?>" class=" form-control">
                    </div>
                </div> -->

                <div class="py-2 px-3">

                    <label for="remark" class="form-label">remark</label>
                    <div class=" text-end">
                        <input type="text" name="remark" id="remark" value="<?= $row["remark"] ?>" class=" form-control">
                    </div>
                </div>







                <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" class="btn btn-dark">修改商品</button>
                    <button type="reset" class="btn btn-outline-dark">重新填寫</button>
                </div>
            </div>
        </div>



    </form>
</div>