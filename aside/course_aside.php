<?php
$path = $_SERVER["REQUEST_URI"];
$file = basename($path);

// ==========判斷有無列表類別屬性==========

if (!isset($_GET["mode"])) {
    $mode=1;
    $modeURL = "&mode=1";
} else {
    $mode=$_GET["mode"];
    $modeURL = "&mode=$mode";
}

?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 w-100">
    <a href="" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none ">
        <span class="fs-4">課程</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">


        <li class="nav-item">
            <!-- 網址參數預設 -->
            <!-- 上架商品 valid=1 -->
            <!-- 顯示 6 筆資料 per_page=6 -->
            <a href="../goral_bike_layout/goral_biker_course-list.php?valid=1&mode=<?=$mode?>" class="nav-link  fst-6 text-center text-wrap text-white
            <?php
            // strpos — 查找字符串首次出现的位置
            // 如果是上架商品且無類別則為所有課程
                if ((strpos($file, "valid=1") !== false) && (strpos($file, "cate") == false)) echo "active" ?>

            " aria-current="page">
                所有課程
            </a>
        </li>

        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_course-list.php?cate=1&valid=1&per_page=6&mode=<?=$mode?>" class="nav-link  fst-6 text-center text-wrap  text-white
            <?php
             // 如果是上架商品且是入門類別則為入門課程
                if ((strpos($file, "cate=1") !== false) && (strpos($file, "valid=1") !== false)) echo "active" ?>
            " aria-current="page">
                入門課程
            </a>
        </li>

        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_course-list.php?cate=2&valid=1&per_page=6&mode=<?=$mode?>" class="nav-link text-white fst-6 text-center text-wrap
            <?php
             // 如果是上架商品且是進階類別則為進階課程
                if ((strpos($file, "cate=2") !== false) && (strpos($file, "valid=1") !== false)) echo "active" ?>
            " aria-current="page">
                進階課程
            </a>
        </li>

        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_course-list.php?valid=0&per_page=6&mode=<?=$mode?>" class="nav-link text-white fst-6 text-center text-wrap
            <?php
               // 如果是下架商品且是進階類別則為管理下架課程
                if ((strpos($file, "valid=0") !== false)) echo "active" ?>
            " aria-current="page">
                管理下架課程
            </a>
        </li>
    </ul>
</div>