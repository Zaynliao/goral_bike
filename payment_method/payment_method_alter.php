<!doctype html>
<html lang="en">
  <head>
    <title>Payment methods</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
      <form action="../payment_method/payment_method_create.php" method="get">
          <h5>Create payment method:</h5>
          <!-- Have 5 here without the id because the id should be on auto incrament -->
          <input type="text" name="name" id="name" class="form-control my-2" placeholder="Enter payment method name">
          <button type="submit" class="btn btn-success mt-2 my-2">Create Payment method</button>
          <button type="reset" class="btn btn-warning mt-2 my-2">Reset</button>
        </form>
        <form action="payment_method_edit_get.php" method="get">
          <h5>Edit, Restore, and Delete payment methods:</h5>
          <a href="../goral_bike_layout/goral_biker_payment_method.php" class="btn btn-secondary">Return to edit page</a>
      </div>
      




      <!-- <a href="payment_methodalter.php?change=edit_get" id="btn2" type="button" class="btn btn-info mt-2 my-2">Edit coupon</a>
      <a href="payment_methodalter.php?change=restore" id="btn3" type="button" class="btn btn-dark mt-2 my-2">Restore coupon</a>
      <a href="payment_methodalter.php?change=delete" id="btn4" type="button" class="btn btn-danger mt-2 my-2">Delete coupon</a> -->
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>