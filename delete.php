<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
}
$sql1 = "DELETE  FROM locations WHERE id=$id";
$result1 = mysqli_query($con,$sql1);

$sql2 = "DELETE  FROM nrpart WHERE idnrpart=$id";
$result2 = mysqli_query($con,$sql2);

$sql3 = "DELETE  FROM expenses WHERE idexpenses=$id";
$result3 = mysqli_query($con,$sql3);

$sql4 = "DELETE  FROM sponsors WHERE idsponsors=$id";
$result4 = mysqli_query($con,$sql4);
if($result1 && $result2 && $result3 && $result4){
    header('location: display.php');
}else{
    die(mysqli_error($con));
}
?>