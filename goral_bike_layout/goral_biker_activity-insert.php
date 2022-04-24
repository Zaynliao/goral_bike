<!doctype html>
<html lang="en">

<head>
    <title>Goral Biker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <div class="container-fluid p-0 m-0">

        <header class="header">
            <?php require("goral_biker_nav.php") ?>
        </header>
        <section class="row p-0 m-0 vh-100">
            <aside class="aside col-2 p-0">
                <?php require("../aside/course_aside.php") ?>
            </aside>
            <article class="article col-10 ">
                <?php
              

                require("../activity/layout/activity-insert.php");
                require("../activity/api/activity-doDelete.php");



                ?>
            </article>
        </section>
        <footer class="footer bg-light">

        </footer>


    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <?php require_once("../product/goral_bike_php/js.php") ?>


</body>

</html>