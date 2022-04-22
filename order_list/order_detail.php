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
`user`.`address`,
`order_list`.`order_id`,
`order_list`.`order_status`,
`order_list`.`order_create_time`,
payment_method.payment_method_name,
`coupons`.`coupon_name`,
`coupons`.`coupon_content`,
`order_list`.`total_amount`,
`product_category`.`product_category_id`,
`product_category`.`product_category_name`
FROM order_list,user,payment_method,coupons,`product_category`
WHERE `order_list`.`order_id`='$order_id'
AND `order_list`.`user_id`=`user`.`id` 
AND `order_list`.`payment_method_id`=`payment_method`.`id` 
AND `order_list`.`coupon_id`=`coupons`.`id` ";



$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_product = "SELECT `product`.`product_name`,`product`.`product_images`,`product`.`product_price` ,`product_category_name`
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

if($row["order_status"]==1){
    $statusName="已付款";
}else{
    $statusName="未付款";
}

?>


<div class="container">
    <p class="badge mb-0 mt-4 text-dark d-flex justify-content-end">訂單創建時間 : <?= $row["order_create_time"] ?></p>
    <div class="card shadow-sm p-4 fw-bold lh-1 bg-light">
        <p class="badge bg-secondary fs-6">訂單編號 : <?= $row["order_id"] ?></p>
        <div class="p-4">
            <p>使用者姓名 : <?= $row["name"] ?></p>
            <p>寄送地址 : <?= $row["address"] ?></p>
            <p>訂單狀態 : <?= $statusName ?></p>
            <ul class="card shadow-sm my-5 py-3 ps-0">
                <?php foreach ($rows as $row_product) : ?>
                <div class="d-flex align-items-center gap-4 justify-content-evenly">
                    <img class="w-25" src="../product/goral_bike_pic/<?= $row_product["product_images"] ?>" alt="">
                    <p><?= $row_product["product_name"] ?></p>
                    <p><?= $row_product["product_category_name"] ?></p>
                    <p>$<?= $row_product["product_price"] ?></p>
                </div>
                <hr>
                <?php endforeach; ?>
            </ul>
            <p>付款方式 : <?= $row["payment_method_name"] ?></p>
            <p>優惠碼 : <?= $row["coupon_name"] ?></p>
            <p>優惠碼內容 : <?= $row["coupon_content"] ?></p>
            <p>總金額 : <?= $row["total_amount"] ?></p>
        </div>
    </div>