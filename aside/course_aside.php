<?php
$path = $_SERVER["REQUEST_URI"];
$file = basename($path);
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 w-100">
    <a href="" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none ">
        <span class="fs-4">課程</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">


        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_course-list.php?valid=1" class="nav-link  fst-6 text-center text-wrap text-white
            <?php
                if ((strpos($file, "valid=1") !== false) && (strpos($file, "cate") == false)): echo "active" ?>
            <?php endif;?>
            " aria-current="page">
                所有商品
            </a>
        </li>

        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_course-list.php?cate=1&valid=1" class="nav-link  fst-6 text-center text-wrap  text-white
            <?php
                if ((strpos($file, "cate=1") !== false) && (strpos($file, "valid=1") !== false)): echo "active" ?>
            <?php endif;?>
            " aria-current="page">
                入門課程
            </a>
        </li>

        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_course-list.php?cate=2&valid=1" class="nav-link text-white fst-6 text-center text-wrap
            <?php
                if ((strpos($file, "cate=2") !== false) && (strpos($file, "valid=1") !== false)): echo "active" ?>
            <?php endif;?>
            " aria-current="page">
                進階課程
            </a>
        </li>

        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_course-list.php?valid=0" class="nav-link text-white fst-6 text-center text-wrap
            <?php
                if ((strpos($file, "valid=0") !== false)): echo "active" ?>
            <?php endif;?>
            " aria-current="page">
                管理下架商品
            </a>
        </li>
    </ul>
</div>