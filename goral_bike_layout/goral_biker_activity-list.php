<!doctype html>
<html lang="en">

<head>
    <title>Goral Biker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- ================= CSS ================= -->
    <style>

        .object-cover {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        p {
            margin: 0px;
        }
        .activity_cont {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

    </style>
</head>

<body>
    <div class="container-fluid p-0 m-0">
    <!-- ================= header ================= -->
        <header class="header">
            <?php require("goral_biker_nav.php") ?>
        </header>

        <section class="row p-0 m-0 vh-100">
    <!-- ================= aside ================= -->
            <aside class="aside col-2 p-0 ">
                <?php require("../aside/activity_aside.php") ?>
            </aside>
    <!-- ================= article ================= -->
            <article class="article col-10 ">
                <?php
                require("../activity/layout/activity-list.php");
                ?>
            </article>
        </section>
        <footer class="footer bg-light"></footer>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <?php require_once("../product/goral_bike_php/js.php") ?>
</body>
</html>
