<?php
require_once("../goral_bike_php/db-connect.php");

$sql = "SELECT * FROM order_list";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}
if (!isset($_GET["type"])) {
    $type = 1;
} else {
    $type = $_GET["type"];
}

// ------type = ?↓
switch ($type) {
    case "1":
        // 動態字串型變數
        $order = "order_id ASC";
        break;
    case "2":
        $order = "order_id DESC";
        break;
    case "3":
        $order = "user_id ASC";
        break;
    case "4":
        $order = "user_id DESC";
        break;
    default:
        $order = "order_id ASC";
}


$sql = "SELECT * FROM order_list";
$result = $conn->query($sql);
$total = $result->num_rows;


$per_page = 8;
$page_count = ceil($total / $per_page);
$start = ($p - 1) * $per_page;

// .............................................頁碼起始,每頁筆數
// ---***---20220407 sql 資料排序語法 order by ---***---
$sql = "SELECT * FROM  order_list ORDER BY $order LIMIT $start,$per_page";
$result = $conn->query($sql);


$rows = $result->fetch_all(MYSQLI_ASSOC);

$product_count = $result->num_rows;


?>
<!doctype html>
<html lang="en">

<head>
    <title>user list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>

<body>

    <div class="container">


        <div class="py-2 text-end mt-5">
            第<?= $p ?>頁,共<?= $total ?>筆,共<?= $page_count ?>頁
        </div>


        <div class="py-2 text-end">
            <a class=" btn btn-outline-dark   <?php if ($type == 1) echo "active " ?>" href="goral_biker_order_list.php?p=<?= $p ?>&type=1">依訂單ID正序排列</a>
            <a class=" btn btn-outline-dark   <?php if ($type == 2) echo "active " ?>" href="goral_biker_order_list.php?p=<?= $p ?>&type=2">依訂單ID反序排列</a>
            <a class=" btn btn-outline-dark   <?php if ($type == 3) echo "active " ?>" href="goral_biker_order_list.php?p=<?= $p ?>&type=3">依使用者ID正序排列</a>
            <a class=" btn btn-outline-dark   <?php if ($type == 4) echo "active " ?>" href="goral_biker_order_list.php?p=<?= $p ?>&type=4">依使用者ID反序排列</a>
        </div>




        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <td>編號</td>
                    <td>使用者</td>
                    <td>地址</td>
                    <td>總金額</td>
                    <td>狀態</td>
                    <td>創建時間</td>
                    <td>備註</td>
                    <td>付款方式</td>
                    <td>優惠卷</td>
                    <td>詳細資訊</td>
                    <td>修改訂單</td>
                    <td>刪除訂單</td>
                </tr>
            </thead>
            <tbody>
            <tbody>

                <?php
                foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row["order_id"] ?></td>
                        <td><?= $row["user_id"] ?></td>
                        <td><?= $row["order_address"] ?></td>
                        <td><?= $row["total_amount"] ?></td>
                        <td><?= $row["order_status"] ?></td>
                        <td><?= $row["order_create_time"] ?></td>
                        <td><?= $row["remark"] ?></td>
                        <td><?= $row["payment_method_id"] ?></td>
                        <td><?= $row["coupon_id"] ?></td>
                        <td><a class="btn btn-primary text-white" href="goral_biker_product_order.php?order=<?= $row["order_id"] ?>">詳細資訊</a></td>
                        <td><a class="btn btn-dark text-white" href="goral_biker_order_list_edit.php?order_id=<?= $row["order_id"] ?>">修改</a></td>
                        <td><a class="btn btn-danger text-white" href="../goral_bike_php/order_list_Delete.php?order_id=<?= $row["order_id"] ?>">刪除</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
            <?php

            ?>

            </tbody>
        </table>

        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item ">
                    <a class="page-link text-dark" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link text-dark" href="goral_biker_order_list.php?p=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
                <?php endfor; ?>


                <li class="page-item">
                    <a class="page-link text-dark" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>