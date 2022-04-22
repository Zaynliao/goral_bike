<!doctype html>
<html lang="en">
  <head>
    <title>Coupons</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <form action="coupons_create.php" method="get">
          <h5>Create coupon:</h5>
          <!-- Have 5 here without the id because the id should be on auto incrament -->
          <input type="text" name="name" id="name" class="form-control my-2" placeholder="Enter coupon name">
          <input type="text" name="code" id="name" class="form-control my-2" placeholder="Enter coupon code">
          <input type="text" name="content" id="name" class="form-control my-2" placeholder="Enter coupon content">
          <input type="date" name="date" id="name" class="form-control my-2" placeholder="Enter coupon expiry date">
          <button type="submit" class="btn btn-success mt-2 my-2 text-white">Create Coupon</button>
          <button type="reset" class="btn btn-warning mt-2 my-2">Reset</button>
        </form>
        <form action="coupons_edit_get.php" method="get">
          <h5>Edit, Restore, and Delete coupons:</h5>
          <a href="../goral_bike_layout/goral_biker_coupons.php" class="btn btn-secondary">Return to coupon page</a>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>