<?php

// $path = $_SERVER["REQUEST_URI"];
require_once("../db-connect.php");

// // echo $path;
// // 透過路徑取得檔名
$file = basename($path);
// echo $file;
// $a = array("所有商品", "登山車基礎車款", "單避震腳踏車", "全避震登山車", "管理下架商品");

$sql = "SELECT * FROM product_category";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// $conn->close();

// if (!isset($_GET["p"])) {
//     $p = 1;
// } else {
//     $p = $_GET["p"];
// }
// if (!isset($_GET["nav_name_id"])) {
//     $nav_name_id = 0;
// } else {
//     $nav_name_id = $_GET["nav_name_id"];
// }

// // ------type = ?↓
// switch ($nav_name_id) {

//     case "1":
//         $path_name = "goral_biker_product.php?product_category_id=1";
//         break;
//     case "2":
//         $path_name = "goral_biker_product.php?product_category_id=2";
//         break;
//     case "3":
//         $path_name = "goral_biker_product.php?product_category_id=3";
//         break;
//     case "4":
//         $path_name = "goral_biker_off_product.php";
//         break;
//     default:
//         $path_name = "goral_biker_product.php";
// // }
// echo basename($_SERVER['PHP_SELF']);

// echo (strpos($file, "product_category_id") === false)
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 w-100">
    <a href="" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none">
        <span class="fs-4">商品</span>
    </a>
    <hr>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="goral_biker_product.php" class="nav-link  fst-6 text-center text-wrap text-white
            <?php if (basename($_SERVER['PHP_SELF']) === "goral_biker_product.php" && strpos($file, "product_category_id") === false) echo "active" ?>
             " aria-current="page">
                所有商品
            </a>
        </li>

        <li class="nav-item">
            <a href="goral_biker_product_category.php" class="nav-link  fst-6 text-center text-wrap text-white
            <?php if (basename($_SERVER['PHP_SELF']) === "goral_biker_product_category.php") echo "active" ?>
            " aria-current="page">
                商品類別管理
            </a>
        </li>


        <?php foreach ($rows as $row) : ?>

            <li class="nav-item">
                <a href="goral_biker_product.php?product_category_id=<?= $row["product_category_id"] ?>" class="nav-link text-white fst-6 text-center text-wrap
                
                <?php
                if (strpos($file, "product_category_id=" . $row["product_category_id"]) !== false) {
                    echo ("active");
                }
                ?>

                ">
                    <?= $row["product_category_name"] ?>
                </a>
            </li>

        <?php endforeach; ?>

        <li class="nav-item">
            <a href="goral_biker_off_product.php" class="nav-link text-white fst-6 text-center text-wrap
            <?php if (basename($_SERVER['PHP_SELF']) === "goral_biker_off_product.php") echo "active" ?>
            ">
                管理下架商品
            </a>
        </li>

    </ul>
</div>