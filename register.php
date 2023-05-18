<?php
$username = $_POST['username'];
$password = $_POST['password'];
//var_dump($username,$password);
$conn= mysqli_connect('localhost', 'root', '','events') or die('Could not connect: ' . mysqli_error($conn));
//echo"Connection succesful.";
$query = "SELECT * FROM credentials WHERE username = '$username'";

$result = $conn->query($query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
      
      echo '<script type="text/javascript">
      window.onload = function () { alert("Username already taken!"); } 
      </script>';
      //header( "Refresh:5; url=index.html", true, 303);
      //header('location: index.html');
    } else{
      $q = "INSERT INTO credentials(username, pass)
VALUES('$username','$password')";
if ($conn->query($q) === TRUE) {
    header('location: regsus.html');
  } else {
    echo "Error: " . $q . "<br>" . $conn->error;
  }

    }
} else {
    echo 'Error: ' . mysqli_error();
}
// close connection
?>