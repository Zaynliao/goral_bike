<?php
//Make a sorting thing
require_once("db-connect.php");
if(!isset($_GET["id"])){
    header("location: 404.php");
}

$id=$_GET["id"];
// echo $id;
$select = mysqli_query($conn, "SELECT * FROM coupons WHERE id = '".$_GET["id"]."'");
if(mysqli_num_rows($select) == 0) {
    exit('This Method Does Not Exist');
}
//SOFT DELETE jk lol
$sql="UPDATE coupons SET valid=1 WHERE id='$id'";




if ($conn->query($sql) === TRUE) {
    	echo "The coupon has been restored";
        header("location: coupons_restore_page.php");
} else {
    	echo "Error" . $conn->error;
}

$conn->close();
?>