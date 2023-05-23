<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search page</title>
</head>
<body>
    <table>
<thead>
        <tr>
          <th scope="col">Event ID</th>
          <th scope="col">Event name</th>
          <th scope="col">Event location</th>
          <th scope="col">Number of participants</th>
          <th scope="col">Expenses</th>
          <th scope="col">Sponsors</th>
        </tr>
      </thead>
      <tbody>
      <?php
	$query = $_GET['query'];
	$min_length = 3;
	if(strlen($query) >= $min_length){
        
    
    $q1 = "SELECT * FROM locations WHERE eventname LIKE '%$query%'";
    $result1 = mysqli_query($con,$q1);
    $q2 = "SELECT * FROM nrpart WHERE eventname LIKE '%$query%'";
    $result2 = mysqli_query($con,$q2);
    $q3 = "SELECT * FROM expenses WHERE eventname LIKE '%$query%'";
    $result3 = mysqli_query($con,$q3);
    $q4 = "SELECT * FROM sponsors WHERE eventname LIKE '%$query%'";
    $result4 = mysqli_query($con,$q4);

    if($result1 && $result2 && $result3 && $result4){
      while(($row1 = mysqli_fetch_assoc($result1)) && ($row2 = mysqli_fetch_assoc($result2)) && ($row3 = mysqli_fetch_assoc($result3)) && ($row4 = mysqli_fetch_assoc($result4))){
        $id = $row1['id'];
        $name = $row1['eventname'];
        $location = $row1['eventlocation'];
        $participants = $row2['participantsnr'];
        $expenses = $row3['price'];
        $sponsors = $row4['sponsors'];
        echo "<tr>
        <th scope='row'>$id</th>
        <td>$name</td>
        <td>$location</td>
        <td>$participants</td>
        <td>$expenses</td>
        <td>$sponsors</td>
        <td><a href='update.php?updateid=$id'><button id='update'>Update</button></a></td>
        <td><a href='delete.php?deleteid=$id'><button id='delete'>Delete</button></a></td>
        <td><a href='view.php?viewid=$id'><button id='view'>View</button></a></td>
        </tr>
    ";
    }
    }}
    else{
      echo '<script>alert("Type at least 3 characters!")</script>';
    }

    ?>
    
      </tbody>
</table>
</body>
</html>