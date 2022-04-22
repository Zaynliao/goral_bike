<?php
require_once("../db-connect.php");

$sql="SELECT * FROM coupons WHERE valid=0";
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
          <a href="../goral_bike_layout/goral_biker_coupons.php" class="btn btn-secondary my-3">Back to coupon page</a>
          <div class="row col-11 justify-content-between align-items-between">
            <table class="table-bordered">
              <tr>
                <td>Coupon id</td>
                <td>Coupon name</td>
                <td>Coupon code</td>
                <td>Coupon content</td>
                <td>Coupon expiry date</td>
                <td>Restore coupon</td>
                <td>Delete</td>
              </tr>
              <?php foreach($rows as $row) : 
            echo '<tr><td>' .$row["id"]. '</td><td>'.$row["coupon_code"]. '</td><td>'.$row["coupon_content"]. '</td><td>'.$row["coupon_expiry_date"]. '</td><td>'.$row["coupon_name"].'</td><td>'?>

          <a href="../coupons/coupons_restore.php?id=<?=$row["id"]?>" class="btn btn-info text-white">Restore coupon</a></td><td>
          <a href="../coupons/coupons_hard_delete.php?id=<?=$row["id"]?>" class="btn btn-danger">Delete</a></td></tr>
          <?php endforeach;?>
        </table>
        </div>  
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>