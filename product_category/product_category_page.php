<?php
require_once("../db-connect.php");

$sql="SELECT * FROM product_category";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
          <a href="../product_category/product_category_alter.php" class="btn btn-secondary">Back to create product category</a>
        <!-- <div class="row col-11 justify-content-between align-items-between"> -->
        <div class="row col-12 justify-content-between align-items-between">
        <?php foreach($rows as $row) : ?>

          <div class="my-2 py-2 bg-light border-2 card">
            <div class="d-flex justify-content-between mt-2 border-bottom border-white pb-1">
              <div class="ms-5 col-4">
                <div class="row row-cols-2">
                  <p class="col-6">Product category id</p>
                  <p class="col-6">Product category name</p>
                </div>
                <div class="row row-cols-2">
                  <p class="col-6"><?=$row["product_category_id"]?></p>
                  <p class="col-6"><?=$row["product_category_name"]?></p>
                </div>
              </div>
                <div>
                    <a href="../product_category/product_category_edit_get.php?id=<?=$row["product_category_id"]?>&name=<?=$row["product_category_name"]?>" class="btn btn-info text-white">Edit product category</a>
                    <a href="../product_category/product_category_delete.php?id=<?=$row["product_category_id"]?>" class="btn btn-danger">Delete product category</a>
                </div>
            </div>
        </div>





        <!-- <div class="my-2 py-2 bg-light border-2 card">
            <div class="d-flex justify-content-between mt-2 border-bottom border-white pb-1">
                <p>Payment method id: <?=$row["id"]?></p>
                <div>
                    <a href="payment_method_edit_get.php?id=<?=$row["id"]?>&name=<?=$row["payment_method_name"]?>" class="btn btn-info text-white">Edit payment method</a>
                    <a href="payment_method_delete.php?id=<?=$row["id"]?>" class="btn btn-danger">Delete payment method</a>
                </div>
            </div>
            <p>Payment method name: <?=$row["payment_method_name"]?></p>
        </div> -->
        <?php endforeach;?>
        </div>  
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>