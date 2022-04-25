<?php

// $path = $_SERVER["REQUEST_URI"];
require_once("../db-connect.php");

$sql = "SELECT * FROM product_category";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 w-100">
    <a href="" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none">
        <span class="fs-4">優惠卷</span>
    </a>
    <hr>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="goral_biker_coupons.php" class="nav-link active fst-6 text-center text-wrap text-white
            " aria-current="page">
                所有優惠卷
            </a>
        </li>

    </ul>
</div>