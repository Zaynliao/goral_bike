<!-- 
    TODO 
    1. 配件類別管理
-->

<?php

// $path = $_SERVER["REQUEST_URI"];
require_once("../db-connect.php");
// $sql = "SELECT * FROM product_category";
// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);
$path = $_SERVER["REQUEST_URI"];
$file = basename($path);

?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 w-100">
    <a href="" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none">
        <span class="fs-4">配件</span>
    </a>
    <hr>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="goral_biker_accessory.php" class="nav-link  fst-6 text-center text-wrap text-white
            <?php if (strpos($file, "biker_accessory.php") !== false) echo "active" ?>
             " aria-current="page">
                所有配件
            </a>
        </li>

        <li class="nav-item">
            <a href="goral_biker_off_accessory.php" class="nav-link text-white fst-6 text-center text-wrap
            <?php if (strpos($file, "biker_off_accessory.php") !== false) echo "active" ?>
            ">
                管理下架配件
            </a>
        </li>

    </ul>
</div>