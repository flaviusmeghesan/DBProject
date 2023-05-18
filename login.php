<?php
$username = $_POST['username'];
$password = $_POST['password'];
//var_dump($username,$password);
$conn= mysqli_connect('localhost', 'root', '','events') or die('Could not connect: ' . mysqli_error($conn));
//echo"Connection succesful.";
$q = "SELECT * FROM credentials where username='$username' and pass='$password'";
$result = mysqli_query($conn,$q);
$count=mysqli_num_rows($result);
if($count>0)
{
  header('location: homepage.html');
}
else{
  echo "Login NOT successful";
}
?>