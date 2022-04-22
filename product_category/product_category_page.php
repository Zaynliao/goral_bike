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
    <a href="goral_biker_product_category_create.php" class="btn btn-success my-3">Create product category</a>
    <!-- <div class="row col-11 justify-content-between align-items-between"> -->
    <div>
            <table class="table-bordered w-100">
              <tr>
                <td>Product category id</td>
                <td>Product category name</td>
                <td>Edit coupon</td>
                <td>Delete</td>
              </tr>
              <?php foreach($rows as $row) : 
            echo '<tr><td>' .$row["product_category_id"].'</td><td>'.$row["product_category_name"].'</td><td class="m-auto">'?>
          <a href="goral_biker_product_category_edit_get.php?id=<?= $row["product_category_id"] ?>&name=<?= $row["product_category_name"] ?>" class="btn btn-info text-white">Edit product category</a></td><td>
          <a href="../product_categoryproduct_category_delete.php?id=<?= $row["product_category_id"] ?>" class="btn btn-danger">Delete product category</a></td></tr>
          <?php endforeach;?>
        </table>
        </div>  
    </div>
  </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>