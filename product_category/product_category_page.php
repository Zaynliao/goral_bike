<?php
require_once("../db-connect.php");

$sql="SELECT * FROM product_category";
$result=$conn->query($sql);

// -----------------------------------------------------------------------------------------------------------------------
$product_valid = 1;
if(!isset($_GET["p"])){
  $p=1;
}else{
  $p=$_GET["p"];
}

if(!isset($_GET["type"])){
$type=1;
}else{
$type=$_GET["type"];
}

switch($type){
case "1":
    $order="product_category_id ASC";
    break;
case "2":
    $order="product_category_id DESC";
    break;
case "3":
    $order="product_category_name ASC";
    break;
case "4":
    $order="product_category_name DESC";
    break;
default:
      $order="product_category_id ASC";
}

$sql = "SELECT * FROM product_category";
$per_page=2;
$result = $conn->query($sql);
$total = $result->num_rows;

$page_count=ceil($total/$per_page);
// echo "user count: ". $result->num_rows;


$start=($p-1)*$per_page;
$sql="SELECT * FROM product_category ORDER BY $order
LIMIT $start,$per_page";
$result = $conn->query($sql);




$rows = $result->fetch_all(MYSQLI_ASSOC);
$user_count=$result->num_rows;
//------------------------------------------------------------------------------------------------------------------------



$conn->close();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Coupon page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <div class="container">
            <a href="goral_biker_product_category_create.php" class="btn btn-success mb-3">Create payment method</a>
            <div>
                <table class="table table-bordered w-100">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <td>Product category id</td>
                            <td>Product category name</td>
                            <td>Edit coupon</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $row) : ?>
                        <tr class="table-light">
                            <td><?=$row["product_category_id"]?></td>
                            <td><?=$row["product_category_name"]?></td>
                            <td class="text-center">
                                <a href="goral_biker_product_category_edit_get.php?id=<?= $row["product_category_id"] ?>&name=<?= $row["product_category_name"] ?>"
                                    class="btn btn-secondary text-white">Edit product category</a>
                            </td>
                            <td class="text-center">
                                <a href="../product_category/product_category_delete.php?id=<?= $row["product_category_id"] ?>"
                                    class="btn btn-danger">Delete product category</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>

        <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-5">

            <ul class="pagination">

                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link "
                        href="goral_biker_product_category.php?p=<?=$i?>"><?=$i?></a>
                </li>
                <?php endfor; ?>

            </ul>
        </nav>

        <div class="py-2 text-center">
            第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
        </div>
    </div>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>