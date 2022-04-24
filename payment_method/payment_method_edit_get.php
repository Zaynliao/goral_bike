<?php
//Make a sorting thing
require_once("../db-connect.php"); 
if((!isset($_GET["name"])) || (!isset($_GET["id"]))){
    echo "this ain't it chief";
}
$id = $_GET["id"];
$name = $_GET["name"];
//prepare the statement
$sql="SELECT * FROM payment_method WHERE valid=1";
$select = mysqli_query($conn, "SELECT * FROM payment_method WHERE id = '".$_GET["id"]."'");
if(mysqli_num_rows($select) == 0) {
    exit('This Method Does Not Exist');
}
$conn -> close();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container-fluid">
        <form action="../payment_method/payment_method_edit.php" method="get">
        <h5>Coupon: <?=$id?></h5>
          <table class="table-bordered w-100">
              <tr>
                <td>Payment method id</td>
                <td>Payment method name</td>
                <td>Edit coupon</td>
                <td>Reset</td>
              </tr>
              <td>
                <?=$id?>
              </td>
              <td>
              <input type="text" name="name" class="form-control my-2" value="<?=$name?>">
              </td>
              </td>
              <input type="hidden" name="id" class="form-control my-2" value="<?=$id?>">
              <input type="hidden" name="name2" class="form-control my-2" value="<?=$name?>">
              <td>
              <button type="submit" class="btn btn-info mt-2 my-2 text-white">Submit new method</button>
              </td>
              <td>
              <button type="reset" class="btn btn-warning mt-2 my-2 text-white">Reset</button>
              </td>
            </table>
            <a href="../goral_bike_layout/goral_biker_payment_method.php" class="btn btn-secondary text-white">Return</a>





          <!-- <h5>New Method:</h5>
          <input type="text" name="name2" id="name2" class="form-control"> -->

          </form>
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
