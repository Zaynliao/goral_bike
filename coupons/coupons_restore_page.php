<?php
require_once("../db-connect.php");
// -----------------------------------------------------------------------------------------------------------------------
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

if(!isset($_GET["filter_name"])){
  $filter_name = "";
}else{
  $filter_name = $_GET["filter_name"];
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

$sql = "SELECT * FROM coupons WHERE valid=0 AND coupon_name LIKE '%$filter_name%'";
$per_page=4;
$result = $conn->query($sql);
$total = $result->num_rows;

$page_count=ceil($total/$per_page);
// echo "user count: ". $result->num_rows;


$start=($p-1)*$per_page;
$sql="SELECT * FROM coupons WHERE valid=0 AND coupon_name LIKE '%$filter_name%' ORDER BY $order
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
        <form action="goral_biker_coupons_restore.php" method="get" class="mb-3 d-flex flex-row-reverse">
          <input type="text" name="filter_name" class="form-control w-25">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </form>
        <div>
          <table class="table table-bordered w-100">
            <thead class="table-dark">
              <tr class="text-center">
                <td>Coupon id</td>
                <td>Coupon name</td>
                <td>Coupon code</td>
                <td>Coupon content</td>
                <td>Coupon expiry date</td>
                <td>Restore coupon</td>
                <td>Delete</td>
              </tr>
            </thead>
            <tbody class="table-light">
              <?php foreach($rows as $row) : 
            echo '<tr><td>' .$row["id"]. '</td><td>'.$row["coupon_code"]. '</td><td>'.$row["coupon_content"]. '</td><td>'.$row["coupon_expiry_date"]. '</td><td>'.$row["coupon_name"].'</td><td>'?>

          <a href="../coupons/coupons_restore.php?id=<?=$row["id"]?>" class="btn btn-info text-white">Restore coupon</a></td><td>
          <a href="../coupons/coupons_delete.php?id=<?=$row["id"]?>" class="btn btn-danger">Delete</a></td></tr>
          <?php endforeach;?>
        </tbody>
        </table>
        </div>
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item ">
                <a class="page-link text-dark" href="goral_biker_coupons_restore.php?p=<?php if($p > 1){echo $p-1;}else{echo $p;} if(isset($filter_name)){echo "&filter_name=$filter_name";}?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>




            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link text-dark" href="goral_biker_coupons_restore.php?p=<?=$i?><?php if(isset($filter_name)){echo "&filter_name=$filter_name";}?>"><?=$i?></a>
                </li>
            <?php endfor; ?>




            <li class="page-item">
                <a class="page-link text-dark" href="goral_biker_coupons_restore.php?p=<?php if($p < $i-1){echo $p+1;}else{echo $p;} if(isset($filter_name)){echo "&filter_name=$filter_name";}?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>  
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>