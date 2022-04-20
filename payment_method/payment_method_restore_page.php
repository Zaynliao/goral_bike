<?php
require_once("db-connect.php");

$sql="SELECT * FROM payment_method WHERE valid=0";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Coupon restore page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
          <a href="payment_method_page.php" class="btn btn-dark my-3">Back to coupon list</a>
          <a href="payment_method_alter.php" class="btn btn-secondary">Back to create payment_method</a>
        <div class="row col-11 justify-content-between align-items-between">
        <?php foreach($rows as $row) : ?>
        <div class="bg-light w-50 border col-4">
            <div class="d-flex justify-content-between mt-2">
                <p>Coupon id: <?=$row["id"]?></p>
                <div>
                    <a href="payment_method_restore.php?id=<?=$row["id"]?>" class="btn btn-info">Restore coupon</a>
                </div>
            </div>
            <p>Payment method name: <?=$row["payment_method_name"]?></p>
        </div>
        <?php endforeach;?>
        </div>  
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>