<?php
require_once("../db-connect.php");
// $sql = "SELECT `user`.`name`,`order_list`.`order_id`,`order_list`.`order_address`,`order_list`.`total_amount`,`order_list`.`order_status`,`order_list`.`order_create_time`,`order_list`.`remark`,`coupons`.`coupon_name`,`coupons`.`coupon_content`,`payment_method`.`payment_method_name` FROM order_list,payment_method,coupons,user WHERE `order_list`.`order_id`='1' AND ";

if (!isset($_GET["order_id"])) {
    exit;
}

$order_id = $_GET["order_id"];
// $order_id = 2;

$sql = "SELECT 
`user`.`name`,
`order_list`.`order_address`,
`order_list`.`order_id`,
`order_list`.`order_status`,
`order_list`.`order_create_time`,
payment_method.payment_method_name,
`coupons`.`coupon_name`,
`coupons`.`coupon_content`,
`order_list`.`total_amount`,
`order_list`.`remark`,
`product_category`.`product_category_id`,
`product_category`.`product_category_name`
FROM order_list,user,payment_method,coupons,`product_category`
WHERE `order_list`.`order_id`='$order_id'
AND `order_list`.`user_id`=`user`.`id` 
AND `order_list`.`payment_method_id`=`payment_method`.`id` 
AND `order_list`.`coupon_id`=`coupons`.`id` ";



$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_product = "SELECT `product`.`product_name`,`product`.`product_id`,`product_order`.`order_count`,`product`.`product_images`,`product`.`product_price` ,`product_category_name`
FROM product_order,product,order_list ,`product_category`
WHERE  `order_list`.`order_id`=`product_order`.`order_id` 
AND `product_order`.`product_id`=`product`.`product_id` 
AND `order_list`.`order_id`='$order_id'
AND `product_category`.`product_category_id`=`product`.`product_category_id` 
";

$result_product = $conn->query($sql_product);
$rows = $result_product->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);


$sql_coupons = "SELECT * FROM `coupons`";
$result_coupons = $conn->query($sql_coupons);
$rows_coupons = $result_coupons->fetch_all(MYSQLI_ASSOC);

$sql_payment = "SELECT * FROM `payment_method`";
$result_payment = $conn->query($sql_payment);
$rows_payment = $result_payment->fetch_all(MYSQLI_ASSOC);


$today = date("Y-m-d");
$sql_product_list = "SELECT * FROM `product`,`product_category` WHERE `product`.`valid`='1' AND `product`.`product_update`<='$today' AND `product`.`product_category_id`=`product_category`.`product_category_id`";
$result_product_list = $conn->query($sql_product_list);
$product_count = $result_product_list->num_rows;
$rows_product_list = $result_product_list->fetch_all(MYSQLI_ASSOC);

// var_dump($rows_product_list);


$conn->close();

// var_dump($rows);

// echo json_encode($row);

if ($row["order_status"] == 1) {
    $statusName = "已付款";
} else {
    $statusName = "未付款";
}

?>
<div class="container d-flex align-items-center">
    <form action="../order_list/order_list_php/order_list_update.php" method="post">
        <div class="">
            <p class="badge mb-0 mt-4 text-dark d-flex justify-content-end">訂單創建時間 : <?= $row["order_create_time"] ?></p>
            <div class="card shadow-sm bg-light p-4 mb-5 pb-0">
                <div class="badge bg-dark d-flex flex-nowrap align-items-center p-2">
                    <p class="fs-6 mb-0 ms-2">訂單編號 : <?= $row["order_id"] ?></p>

                    <input type="hidden" name="order_id" id="order_id" value="<?= $row["order_id"] ?>"></input>

                </div>
                <div class="row">
                    <ul class="p-3 pb-0">
                        <li class="card shadow-sm px-3 pt-2 my-3">

                            <div class="title border-bottom fw-bold">
                                <p class="mb-0">使用者姓名</p>
                            </div>
                            <p class="mt-3 text-center"><?= $row["name"] ?></p>
                        </li>
                        <li class="card shadow-sm px-3 pt-2 my-3">
                            <div class="title border-bottom fw-bold">
                                <p class="mb-0">寄送地址</p>
                            </div>
                            <input name="order_address" id="order_address" type="text" class="my-3 text-center form-control" value="<?= $row["order_address"] ?>"></input>

                        </li>
                        <li class="card shadow-sm px-3 pt-2 my-3">
                            <div class="title border-bottom">
                                <p class="mb-0 fw-bold">優惠碼 - <?= $row["coupon_name"] ?></p>
                                <select class="form-select form-select-sm my-2" name="coupon_id" id="coupon_id" aria-label=".form-select-sm example">

                                    <?php foreach ($rows_coupons as $coupons_row) : ?>
                                        <option value="<?= $coupons_row["id"] ?>"><?= $coupons_row["coupon_name"] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </li>
                        <li class="card shadow-sm px-3 pt-2 my-3">
                            <div class="title border-bottom">
                                <p class="mb-0 fw-bold">備註</p>
                            </div>
                            <textarea name="remark" id="remark" type="text" class="my-3 form-control"><?= $row["remark"] ?></textarea>

                        </li>
                        <li class="card shadow-sm px-3 py-2 my-3">
                            <div class="title border-bottom">
                                <p class="mb-0 fw-bold">付款狀態 -<?= $statusName ?></p>
                            </div>
                            <select class="form-select form-select-sm mt-2" name="order_status" id="order_status" aria-label=".form-select-sm example">
                                <option value="0">未付款</option>
                                <option value="1">已付款</option>
                            </select>
                        </li>
                        <li class="card shadow-sm px-3 py-2 my-3">
                            <div class="title border-bottom">
                                <p class="mb-0 fw-bold">付款方式</p>
                            </div>
                            <!-- payment_method_name -->
                            <select class="form-select form-select-sm my-2" name="payment_method_id" id="payment_method_id" aria-label=".form-select-sm example">

                                <?php foreach ($rows_payment as $payment_row) : ?>
                                    <option value="<?= $payment_row["id"] ?>"><?= $payment_row["payment_method_name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>


                        <!-- <li class="badge rounded-pill bg-warning text-dark shadow-sm ms-2 my-2">
                       
                    </li> -->

                    </ul>
                    <ul class="p-3 pb-0 col-12">
                        <li class="card shadow-sm px-3 pt-2 my-3">
                            <div class="title border-bottom fw-bold">
                                <p class="mb-0">訂單商品</p>
                            </div>
                            <?php foreach ($rows as $row_product) : ?>
                                <div class="row align-items-center justify-content-around mt-4 mx-auto p-4 text-center">
                                    <img class="w-25 col-12 col-lg-2" src="../product/goral_bike_pic/<?= $row_product["product_images"] ?>" alt="">
                                    <p class="col-12 col-xl-2"><?= $row_product["product_name"] ?></p>
                                    <p class="col-12 col-xl-2"><?= $row_product["product_category_name"] ?></p>
                                    <p class="col-12 col-xl-2">$<?= $row_product["product_price"] ?></p>

                                    <p class="col-12 col-xl-1">數量：</p>
                                    <input type="number" name="count" id="count" class="text-center form-control col-12 col-xl-2" style="width:65px" value="<?= $row_product["order_count"] ?>"></input>

                                    <input type="hidden" name="product_id" id="product_id" value="<?= $row_product["product_id"] ?>"></input>

                                    <button type="submit" class="btn btn-danger col-1" formaction="../order_list/order_list_php/order_list_delete.php">刪除</button>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                            <span class="text-end fw-bold d-flex flex-wrap justify-content-between">
                                <p class="text-nowrap">總額 - </p>
                                <p class="text-nowrap">$ <?= $row["total_amount"] ?></p>
                            </span>
                        </li>
                    </ul>
                    <div class=" d-flex justify-content-end gap-3">

                        <button class="btn btn btn-dark w-25 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            商品列表
                        </button>

                        <button type="submit" class="btn btn-dark w-25 mb-3" aria-current="page">
                            修改訂單
                        </button>
                        <a href="goral_biker_order_list.php" class="btn btn-secondary w-25 mb-3" aria-current="page">
                            返回訂單列表
                        </a>
                    </div>

                    <form action="" method="post">
                        <div class="collapse my-2 show" id="collapseExample">
                            <div class="card card-body">
                                <div class="row mt-2">
                                    <div class="row justify-content-end align-items-center gap-3">
                                        <h2 class="h2 mt-5">商品列表</h2>
                                        <p class="text-end">今日日期：<?= $today ?></p>
                                        <input class="btn col-2 my-3 btn-dark" type="button" value="全部選取" onclick="usel();">
                                        <input type="hidden" name="order_id" value="<?= $order_id ?>">
                                        <button class="btn col-2 my-3 btn-primary" type="submit">批次上架</button>
                                    </div>


                                    <?php if ($product_count > 0) : ?>
                                        <?php foreach ($rows_product_list as $row_p) : ?>
                                            <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                                                <div class="card px-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input mt-3" type="checkbox" value="<?= $row_p["product_id"] ?>" name="check[]" id="check">
                                                        <h1 class="h6 fw-bold mt-3 text-end">上架日期 : <?= $row_p["product_update"] ?></h1>
                                                    </div>
                                                    <figure class=" figure d-flex justify-content-center align-items-center" style="height: 280px;">

                                                        <img class="img-fluid" src="../product/goral_bike_pic/<?= $row_p["product_images"] ?>" alt="">

                                                    </figure>

                                                    <div class="mb-3 ">
                                                        <span class="badge rounded-pill bg-danger" <?php if (!$row_p["product_category_name"]) : echo "hidden" ?> <?php endif; ?>>
                                                            <?= $row_p["product_category_name"] ?>
                                                        </span>
                                                        <span class="badge bg-dark rounded-pill" <?php if (!$row_p["product_price"]) : echo "hidden" ?> <?php endif; ?>>
                                                            $ <?= $row_p["product_price"] ?>
                                                        </span>
                                                    </div>
                                                    <h1 class="h4 fw-bold my-3 text-center"><?= $row_p["product_name"] ?></h1>

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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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