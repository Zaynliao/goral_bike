<?php

$path = $_SERVER["REQUEST_URI"];

// echo $path;
// 透過路徑取得檔名
$file = basename($path);
// echo $file;

?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark container-fluid">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Goral Biker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($file === "") echo "active" ?>" aria-current="page" href="goral_biker_product.php">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (strpos($file, "product") !== false) {
                        echo ("active");
                    } ?>" href="goral_biker_product.php">商品</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (strpos($file, "course") !== false) {
                        echo ("active");
                    } ?>
                    " href="goral_biker_course-list.php">課程</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (strpos($file, "x") !== false) {
                        echo ("active");
                    } ?>" href="goral_biker_product.php">活動</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (strpos($file, "user") !== false) {
                        echo ("active");
                    } ?>" href="goral_biker_user_list.php">會員</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (strpos($file, "order") !== false) {
                        echo ("active");
                    } ?>" href="goral_biker_order_list.php">訂單</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (strpos($file, "coupons") !== false) {
                        echo ("active");
                    } ?>" href="goral_biker_coupons.php">優惠卷</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (strpos($file, "payment") !== false) {
                        echo ("active");
                    } ?>" href="goral_biker_payment_method.php">付款方式</a>
                </li>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>