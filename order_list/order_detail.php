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
`payment_method`.`payment_method_name`,
`coupons`.`coupon_name`,
`coupons`.`coupon_content`,
`order_list`.`total_amount`,
`order_list`.`remark`,
`product_category`.`product_category_id`,
`product_category`.`product_category_name`
FROM order_list,
user,
payment_method,
coupons,
product_category
WHERE `order_list`.`order_id`='$order_id'
AND `order_list`.`user_id`=`user`.`id` 
AND `order_list`.`payment_method_id`=`payment_method`.`id` 
AND `order_list`.`coupon_id`=`coupons`.`id` ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();


$sql_total = "SELECT SUM(`product`.`product_price`) AS total FROM `product`,`product_order`,`order_list` WHERE `product_order`.`product_id`=`product`.`product_id`AND`product_order`.`order_id`=`order_list`.`order_id` AND `order_list`.`order_id` ='$order_id';";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();


$sql_product = "SELECT 
`product`.`product_name`,
`product_order`.`order_count`,
`product`.`product_images`,
`product`.`product_price` ,
`product_category_name`
FROM product_order,product,order_list ,`product_category`
WHERE  `order_list`.`order_id`=`product_order`.`order_id` 
AND `product_order`.`product_id`=`product`.`product_id` 
AND `order_list`.`order_id`='$order_id'
AND `product_category`.`product_category_id`=`product`.`product_category_id` 
";

$result_product = $conn->query($sql_product);
$rows = $result_product->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);

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
    <div class="">
        <p class="badge mb-0 mt-4 text-dark d-flex justify-content-end">訂單創建時間 : <?= $row["order_create_time"] ?></p>
        <div class="card shadow-sm bg-light p-4 mb-5 pb-0">
            <div class="badge bg-dark d-flex flex-nowrap align-items-center py-0">
                <p class="fs-6 mb-0 ms-2">訂單編號 : <?= $row["order_id"] ?></p>
                <p class="badge rounded-pill bg-success shadow-sm ms-2 my-2"><?= $statusName ?></p>
                <p class="badge rounded-pill bg-warning text-dark shadow-sm ms-2 my-2">
                    <?= $row["payment_method_name"] ?>
                </p>
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
                        <p class="mt-3 text-center"><?= $row["order_address"] ?></p>
                    </li>
                    <li class="card shadow-sm px-3 pt-2 my-3">
                        <div class="title border-bottom">
                            <p class="mb-0 fw-bold">優惠碼 - <?= $row["coupon_name"] ?></p>
                        </div>
                        <p class="mt-3 text-center"><?= $row["coupon_content"] ?></p>
                    </li>
                    <li class="card shadow-sm px-3 pt-2 my-3">
                        <div class="title border-bottom">
                            <p class="mb-0 fw-bold">備註</p>
                        </div>
                        <p class="mt-3 text-center"><?= $row["remark"] ?></p>
                    </li>
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
                                <!-- <p class="col-12 col-xl-2">數量：<?= $row_product["order_count"] ?></p> -->
                                <!-- <a class="btn btn-danger col-1">刪除</a> -->
                            </div>
                            <hr>
                        <?php endforeach; ?>
                        <h4 class="h4 text-end py-4 mx-3">總金額：＄<?= $row_total["total"] ?></h4>
                        <input type="hidden" name="total" id="total" value="<?= $row_total["total"] ?>">
                        <h4 class="h4 text-success text-end py-4 mx-3">優惠卷折扣 總金額：＄<?= $row_total["total"] * $row["discount"] ?> </h4>
                        <input type="hidden" name="total" id="total" value="<?= $row_total["total"] * $row["discount"] ?>">
                    </li>
                </ul>
                <div class="row justify-content-end gap-3">
                    <a class="btn btn-dark text-white w-25 mb-3 " href="goral_biker_order_list_edit.php?order_id=<?= $row["order_id"] ?>">修改</a>
                    <a href="goral_biker_order_list.php" class="btn btn-secondary w-25 mb-3" aria-current="page">
                        返回訂單列表
                    </a>
                </div>
            </div>
        </div>
    </div>