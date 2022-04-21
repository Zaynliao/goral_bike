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
`order_list`.`total_amount`
FROM order_list,user,payment_method,coupons 
WHERE `order_list`.`order_id`='$order_id'
AND `order_list`.`user_id`=`user`.`id` 
AND `order_list`.`payment_method_id`=`payment_method`.`id` 
AND `order_list`.`coupon_id`=`coupons`.`id` ";



$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_product = "SELECT `product`.`product_name`,`product`.`product_images`,`product`.`product_price` FROM product_order,product,order_list WHERE  `order_list`.`order_id`=`product_order`.`order_id` AND `product_order`.`product_id`=`product`.`product_id` AND `order_list`.`order_id`='$order_id'";

$result_product = $conn->query($sql_product);
$rows = $result_product->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);

$conn->close();

// var_dump($rows);

// echo json_encode($row);

?>


<div class="container">

    <div class="mt-5 card">

        <p>訂單編號 : <?= $row["order_id"] ?> </p>
        <p>使用者姓名 : <?= $row["name"] ?></p>
        <p>寄送地址 : <?= $row["address"] ?></p>
        <p>訂單狀態 : <?= $row["order_status"] ?></p>
        <p>訂單創建時間 : <?= $row["order_create_time"] ?></p>

        <ul>
            <div class="row">
                <?php foreach ($rows as $row_product) : ?>


                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">

                        <div class="card p-2">


                            <figure class=" figure d-flex justify-content-center align-items-center" style="height: 240px;">
                                <img class="img-fluid" src="../product/goral_bike_pic/<?= $row_product["product_images"] ?>" alt="">
                            </figure>



                            <h1 class="text-center h4"><?= $row_product["product_name"] ?></h1>

                            <div class="py-2 px-3">
                                <div class="price text-end">
                                    $<?= $row_product["product_price"] ?>
                                </div>
                            </div>


                        </div>
                    </div>




                <?php endforeach; ?>
            </div>
        </ul>
        <p>付款方式 : <?= $row["payment_method_name"] ?></p>
        <p>優惠碼 : <?= $row["coupon_name"] ?></p>
        <p>優惠碼內容 : <?= $row["coupon_content"] ?></p>
        <p>總金額 : <?= $row["total_amount"] ?></p>

    </div>