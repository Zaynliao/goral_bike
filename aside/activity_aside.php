<?php
$path = $_SERVER["REQUEST_URI"];
$file = basename($path);
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 w-100">
    <a href="" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none ">
        <span class="fs-4">活動</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_activity-list.php" class="nav-link fst-6 text-center text-wrap text-white" aria-current="page">全部活動</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link  fst-6 text-center text-wrap  text-white" aria-current="page">活動地區</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white fst-6 text-center text-wrap" aria-current="page">報名狀態</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white fst-6 text-center text-wrap" aria-current="page">已下架活動</a>
        </li>
    </ul>
</div>