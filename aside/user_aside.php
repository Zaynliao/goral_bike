<?php
$path = $_SERVER["REQUEST_URI"];
$file = basename($path);
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100 w-100">
    <a href="" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 text-white text-decoration-none ">
        <span class="fs-4">會員</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">


        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_user_register.php" class="nav-link  fst-6 text-center text-wrap text-white
            <?php
                if ((strpos($file, "user_register") !== false)): echo "active" ?>
            <?php endif;?>
            " aria-current="page">
                註冊
            </a>
        </li>

        <li class="nav-item">
            <a href="../goral_bike_layout/goral_biker_user_list.php" class="nav-link  fst-6 text-center text-wrap  text-white
            <?php
                if ((strpos($file, "user_list") !== false)): echo "active" ?>
            <?php endif;?>
            " aria-current="page">
                會員管理
            </a>
        </li>
    </ul>
</div>