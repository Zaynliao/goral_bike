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
            <a class=" nav-link fst-6 text-center text-wrap text-white" aria-current="page" data-bs-toggle="collapse" href="#collapseValid" role="button" aria-expanded="false" aria-controls="collapseValid">活動地區</a>
            <div class="collapse " id="collapseValid">
                <ul class="">
                    <li class="list-unstyled">
                        <a href="../goral_bike_layout/goral_biker_activity-list.php?activity_venue_id=1" class="nav-link fst-6 text-wrap text-white">北部</a>
                        <a href="../goral_bike_layout/goral_biker_activity-list.php?activity_venue_id=2" class="nav-link fst-6 text-wrap text-white">中部</a>
                        <a href="../goral_bike_layout/goral_biker_activity-list.php?activity_venue_id=3" class="nav-link fst-6 text-wrap text-white">南部</a>
                        <a href="../goral_bike_layout/goral_biker_activity-list.php?activity_venue_id=4" class="nav-link fst-6 text-wrap text-white">東部</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class=" nav-link fst-6 text-center text-wrap text-white" aria-current="page" data-bs-toggle="collapse" href="#collapseStatus" role="button" aria-expanded="false" aria-controls="collapseStatus">報名狀態</a>
            <div class="collapse " id="collapseStatus">
                <ul>
                    <li class="list-unstyled">
                        <a href="../goral_bike_layout/goral_biker_activity-list.php?activity_venue_id=1" 
                           class="nav-link fst-6 text-wrap text-white">未開放報名</a>
                        <a href="#" 
                           class="nav-link fst-6 text-wrap text-white">報名開放中</a>
                        <a href="#"
                           class="nav-link fst-6 text-wrap text-white">報名已截止</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_activity-list.php?valid=0" class="nav-link text-white fst-6 text-center text-wrap" aria-current="page">已下架活動</a>
        </li>
    </ul>
</div>