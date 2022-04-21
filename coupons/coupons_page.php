<?php
require_once("db-connect.php");


$sql = "SELECT * FROM coupons WHERE valid=1";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <a href="coupons_restore_page.php" class="btn btn-dark my-3">Restore deleted coupons</a>
    <a href="coupons_alter.php" class="btn btn-secondary">Back to create coupons</a>
    <div class="row row-cols-1 gap-2 my-2">
      <?php foreach ($rows as $row) : ?>
        <div class="bg-light card">
          <div class="d-flex justify-content-between my-2">
            <p>Coupon id: <?= $row["id"] ?></p>
            <div>
              <a href="coupons_edit_get.php?id=<?= $row["id"] ?>&name=<?= $row["coupon_name"] ?>&code=<?= $row["coupon_code"] ?>&content=<?= $row["coupon_content"] ?>&date=<?= $row["coupon_expiry_date"] ?>" class="btn btn-info text-white">Edit coupon</a>
              <a href="coupons_delete.php?id=<?= $row["id"] ?>" class="btn btn-danger">Delete coupon</a>
            </div>
          </div>
          <p>Coupon name: <?= $row["coupon_name"] ?></p>
          <p>Coupon code: <?= $row["coupon_code"] ?></p>
          <p>Coupon content: <?= $row["coupon_content"] ?></p>
          <p>Coupon expiry date: <?= $row["coupon_expiry_date"] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>