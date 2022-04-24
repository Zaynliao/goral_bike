<?php
require_once("../db-connect.php");
if(!isset($_POST["name"])){
    exit("no");
  }
// $valid = $_POST["valid"];
// $where = $_POST["where"];
$name = $_POST["name"];
$sql = "SELECT * FROM coupons
WHERE valid=1 AND coupon_name LIKE '%$name%'"
// header("location: ");
?>