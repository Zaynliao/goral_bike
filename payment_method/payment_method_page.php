<?php
require_once("../db-connect.php");


$sql = "SELECT * FROM payment_method WHERE valid=1";
$result = $conn->query($sql);

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
    $order="id ASC";
    break;
case "2":
    $order="id DESC";
    break;
case "3":
    $order="name ASC";
    break;
case "4":
    $order="name DESC";
    break;
default:
      $order="id ASC";
}

$sql = "SELECT * FROM payment_method WHERE valid=1";
$per_page=4;
$result = $conn->query($sql);
$total = $result->num_rows;

$page_count=ceil($total/$per_page);
// echo "user count: ". $result->num_rows;


$start=($p-1)*$per_page;
$sql="SELECT * FROM payment_method  WHERE valid=1 ORDER BY $order
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <a href="goral_biker_payment_method_restore.php" class="btn btn-dark my-3">Restore hidden payment method</a>
    <a href="goral_biker_payment_method_create.php" class="btn btn-success">Create payment method</a>
    <!-- <div class="row col-11 justify-content-between align-items-between"> -->
    <div>
            <table class="table-bordered w-100">
              <tr>
                <td>Payment method id</td>
                <td>Payment method name</td>
                <td>Edit coupon</td>
                <td>Hide</td>
                </tr>
              <?php foreach($rows as $row) : 
            echo '<tr><td>' .$row["id"].'</td><td>'.$row["payment_method_name"].'</td><td class="m-auto">'?>
          <a href="goral_biker_payment_method_edit_get.php?id=<?= $row["id"] ?>&name=<?= $row["payment_method_name"] ?>" class="btn btn-info text-white">Edit payment method</a></td><td>
          <a href="../payment_method/payment_method_hide.php?id=<?= $row["id"] ?>" class="btn btn-danger">Hide payment method</a></td></tr>
          <?php endforeach;?>
        </table>
        </div>  
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item ">
                <a class="page-link text-dark" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>




            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link text-dark" href="goral_biker_payment_method.php?p=<?=$i?>"><?=$i?></a>
                </li>
            <?php endfor; ?>




            <li class="page-item">
                <a class="page-link text-dark" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="py-2 text-center">
        第 <?= $p ?> 頁 , 共 <?= $page_count ?> 頁 , 共 <?= $total ?> 筆
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>