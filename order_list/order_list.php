<?php
require_once("../db-connect.php");

$sql = "SELECT * FROM order_list";
$result = $conn->query($sql);

$rows = $result->fetch_all(MYSQLI_ASSOC);

$a = array(
    "依訂單ID正序排列",
    "依訂單ID反序排列",
    "依使用者ID正序排列",
    "依使用者ID反序排列",
    "依總價正序排列",
    "依總價反序排列",
    "依訂單狀態正序排列",
    "依訂單狀態反序排列",
    "依日期正序排列",
    "依日期反序排列",
    "依付款方式正序排列",
    "依付款方式反序排列",
    "依優惠卷正序排列",
    "依優惠卷反序排列"
);

// var_dump($rows);

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}
if (!isset($_GET["type"])) {
    $type = 0;
} else {
    $type = $_GET["type"];
}

if (!isset($_GET["per_page"])) {
    $per_page = 8;
} else {
    $per_page = $_GET["per_page"];
}

if (!isset($_GET["search"])) {
    $search = "";
    $path_query = "goral_biker_order_list.php?";
} else {
    $search = $_GET["search"];
    $path_query = "goral_biker_order_list.php?search=$search";
}


// ------type = ?↓

switch ($type) {
    case "0":
        // 動態字串型變數
        $order = "`order_list`.`order_id` ASC";
        break;
    case "1":
        $order = "`order_list`.`order_id` DESC";
        break;
    case "2":
        $order = "`order_list`.`user_id` ASC";
        break;
    case "3":
        $order = "`order_list`.`user_id` DESC";
        break;
    case "4":
        $order = "`order_list`.`total_amount` ASC";
        break;
    case "5":
        $order = "`order_list`.`total_amount` DESC";
        break;
    case "6":
        $order = "`order_list`.`order_status` ASC";
        break;
    case "7":
        $order = "`order_list`.`order_status` DESC";
        break;
    case "8":
        $order = "`order_list`.`order_create_time` ASC";
        break;
    case "9":
        $order = "`order_list`.`order_create_time` DESC";
        break;
    case "10":
        $order = "`order_list`.`payment_method_id` ASC";
        break;
    case "11":
        $order = "`order_list`.`payment_method_id` DESC";
        break;
    case "12":
        $order = "`order_list`.`coupon_id` ASC";
        break;
    case "13":
        $order = "`order_list`.`coupon_id` DESC";
        break;
    default:
        $order = "`order_list`.`order_id` ASC";
}

$sql = "SELECT * FROM  order_list 
LEFT JOIN payment_method on order_list.payment_method_id=payment_method.id
LEFT JOIN coupons on order_list.coupon_id=coupons.id
LEFT JOIN user on order_list.user_id=user.id
WHERE 
`user`.`name` LIKE '%$search%' OR
`order_list`.`remark` LIKE '%$search%'";

$result = $conn->query($sql);
$total = $result->num_rows;



$page_count = ceil($total / $per_page);
$start = ($p - 1) * $per_page;

// .............................................頁碼起始,每頁筆數
// ---***---20220407 sql 資料排序語法 order by ---***---
$sql = "SELECT * FROM  order_list 
LEFT JOIN payment_method on order_list.payment_method_id=payment_method.id
LEFT JOIN coupons on order_list.coupon_id=coupons.id
LEFT JOIN user on order_list.user_id=user.id
WHERE 
`user`.`name` LIKE '%$search%' OR
`order_list`.`remark` LIKE '%$search%' 
ORDER BY $order LIMIT $start,$per_page";
$result = $conn->query($sql);


$rows = $result->fetch_all(MYSQLI_ASSOC);

$product_count = $result->num_rows;

// $sql_total="SELECT SUM(`product`.`product_price`) AS total FROM `product`,`product_order`,`order_list` WHERE `product_order`.`product_id`=`product`.`product_id`AND`product_order`.`order_id`=`order_list`.`order_id` AND `order_list`.`order_id` ='1';";
// $result_total = $conn->query($sql_total);
// $row_total=$result_total->fetch_all(MYSQLI_ASSOC);



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

    <style>
        .object-cover {
            width: 24px;
            height: 24px;
            object-fit: cover;
        }
    </style>

</head>

<body>

    <div class="container-fluid">



        <div class="row justify-content-end gap-3 mt-3">

            <select class="form-select w-25" aria-label="Default select example" onchange="location.href=this.options[this.selectedIndex].value;">

                <?php for ($i = 0; $i < count($a); $i++) : ?>

                    <option value="<?= $path_query ?>&type=<?= $i ?>&p=<?= $p ?>&per_page=<?= $per_page ?>" <?php if ($type == $i) echo "selected" ?>>
                        <?= $a[$i] ?></option>
                <?php endfor; ?>

            </select>

            <select class="form-select w-25" aria-label="Default select example" onchange="location.href=this.options[this.selectedIndex].value;">

                <?php for ($i = 1; $i <= 4; $i++) : ?>

                    <option value="<?= $path_query ?>&type=<?= $type ?>&p=<?= $p ?>&per_page=<?= $i * 4 ?>" <?php if ($per_page == $i * 4) echo "selected" ?>>每頁<?= $i * 4 ?>筆</option>

                <?php endfor; ?>

            </select>
        </div>

        <div class="py-2">

            <p class="text-end">
                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    篩選
                </button>
            </p>

            <div class="collapse show" id="collapseExample">
                <div class="">

                    <form action="" method="get">

                        <div class="row justify-content-start align-items-center gx-2">

                            <input type="hidden" name="p" id="p" value="<?= $p ?>">
                            <input type="hidden" name="type" id="type" value="<?= $type ?>">
                            <input type="hidden" name="per_page" id="per_page" value="<?= $per_page ?>">

                            <h5 class="fw-bold mt-3">名稱篩選</h5>

                            <div class="col my-2">
                                <input type="text" class="form-control" value="<?= $search ?>" name="search" id="search" placeholder="search" aria-label="search">
                            </div>
                            <p></p>
                            <div class="col-auto ms-auto mt-1">
                                <button type="submit" class="btn btn-secondary">查詢</button>
                                <button type="reset" class="btn btn-outline-secondary">重新填寫</button>
                                <a href="goral_biker_order_list.php" class="btn btn-outline-secondary">清除篩選</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

        <div class="space mt-5"></div>
        <table class="table table-bordered text-center">
            <div class="d-flex flex-nowrap justify-content-star gap-2 mb-2">
                <div class="check-img-box">
                    <img class="object-cover" src="../order_list/icon/check.png" alt="">
                    <span class="">已付款</span>
                </div>
                <div class="nocheck-img-box">
                    <img class="object-cover" src="../order_list/icon/remove.png" alt="">
                    <span class="">未付款</span>
                </div>
            </div>

            <thead class="table-dark">
                <tr class="fw-bold">

                    <td>編號</td>
                    <td>使用者</td>
                    <td>狀態</td>
                    <td>總價</td>
                    <td>創建時間</td>
                    <td width="480px">備註</td>
                    <td>付款方式</td>
                    <td>優惠卷</td>
                    <td>詳細資訊</td>

                    <td>刪除訂單</td>
                </tr>
            </thead>
            <tbody>
            <tbody>

                <?php
                foreach ($rows as $row) : ?>
                    <?php
                    if ($row["order_status"] == 1) {
                        $statusName = "check.png";
                    } else {
                        $statusName = "remove.png";
                    }
                    ?>
                    <tr>

                        <td><?= $row["order_id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><img class="object-cover" src="../order_list/icon/<?= $statusName ?>" alt=""></td>
                        <td><?= $row["total_amount"] ?></td>
                        <td><?= $row["order_create_time"] ?></td>
                        <td width="480px">
                            <?= $row["remark"] ?>
                        </td>
                        <td><?= $row["payment_method_name"] ?></td>
                        <td><?= $row["coupon_name"] ?></td>
                        <td><a class="btn btn-primary text-white" href="goral_biker_order_list_detail.php?order_id=<?= $row["order_id"] ?>">詳細資訊</a>
                        </td>
                        <!-- <td><a class="btn btn-dark text-white" href="goral_biker_order_list_edit.php?order_id=<?= $row["order_id"] ?>">修改</a></td> -->
                        <td class="delete-table"><a class="btn btn-danger text-white" href="../product/goral_bike_php/order_list_Delete.php?order_id=<?= $row["order_id"] ?>">刪除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
            <?php

            ?>

            </tbody>
        </table>

        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">


                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>">
                        <a class="page-link " href="<?= $path_query ?>&p=<?= $i ?>&type=<?= $type ?>&per_page=<?= $per_page ?>" <?php if ($type == $i) echo "selected" ?>><?= $i ?></a>
                    </li>
                <?php endfor; ?>


            </ul>
        </nav>
        <div class="py-2 text-center">
            第　<?= $p ?>　頁　，　共　<?= $total ?>　筆　，　共　<?= $page_count ?>　頁
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