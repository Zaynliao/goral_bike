<!doctype html>
<html lang="en">

<head>
    <title>Goral Biker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- css & bs5 -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
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
              

                require("../course/layout/upload-course.php");

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