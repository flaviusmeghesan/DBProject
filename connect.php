<?php
$con = new mysqli('localhost','root','','events');
if(!$con){
    die(mysqli_error($con));
}
?>