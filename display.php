<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./assets/stylehome.css" />
</head>
<body>
<div class="background">
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
   <span></span>
</div>
<div class="main">
  <form action="search.php" method="GET">
		<input type="text" name="query" placeholder="Search event by name" />
		<input type="submit" value="Search"/>
	</form>
  <div class="tbl">
        <table class="table">
  <thead>
    <tr>
      <th id="hd" scope="col">Event ID</th>
      <th id="hd" scope="col">Event name</th>
      <th id="hd" scope="col">Event location</th>
      <th id="hd" scope="col">Number of participants</th>
      <th id="hd" scope="col">Expenses</th>
      <th id="hd" scope="col">Sponsors</th>
      <th id="hd" scope="col" >Operations</th>
    </tr>
  </thead>
  <tbody>
  <?php

$q1 = "SELECT * FROM locations";
$result1 = mysqli_query($con,$q1);
$q2 = "SELECT * FROM nrpart";
$result2 = mysqli_query($con,$q2);
$q3 = "SELECT * FROM expenses";
$result3 = mysqli_query($con,$q3);
$q4 = "SELECT * FROM sponsors";
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
    <td><a href='update.php?updateid=$id'><button id='update'>Update</button></a>
    <a href='delete.php?deleteid=$id'><button id='delete'>Delete</button></a>
    <a href='view.php?viewid=$id'><button id='view'>View</button></a></td>
    </tr>
";
}
}

?>

  </tbody>
</table>
<div class="simplebutton">
<button class="addbutton" onclick="location.href = 'event.php'">Add event</button>
</div>
<div class="simplebutton">
<button class="logoutbutton" onclick="location.href = 'index.html'">Log out</button>
</div>
</div>

</div>

</div>
</body>
</html>