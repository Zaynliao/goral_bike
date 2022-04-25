<!doctype html>
<html lang="en">

<head>
    <title>Goral Biker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- css & bs5 -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="container-fluid p-0 m-0">

        <header class="header">
            <?php require("goral_biker_nav.php") ?>
        </header>
        <section class="row p-0 m-0 vh-100">
            <aside class="aside col-2 p-0">
                <?php require("../aside/accessory_aside.php") ?>
            </aside>
            <article class="article col-10 ">
                <?php require("../accessory/accessory_update.php") ?>
            </article>
        </section>
        <footer class="footer bg-light">

        </footer>


    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <?php require_once("../accessory/js.php") ?>


</body>

</html>