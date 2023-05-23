<?php
include 'connect.php';
$id=$_GET['viewid'];
$sql1 = "SELECT * FROM locations WHERE id = $id";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM expenses WHERE idexpenses = $id";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM nrpart WHERE idnrpart = $id";
$result3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_assoc($result3);

$sql4 = "SELECT * FROM sponsors WHERE idsponsors = $id";
$result4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_assoc($result4);


$idd = $row1['id'];
$eventname = $row1['eventname'];
$eventlocation = $row1['eventlocation'];
$eventexpenses = $row2['price'];
$eventparticipants = $row3['participantsnr'];
$eventsponsors = $row4['sponsors'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="Stylesheet" type="text/css" href="./assets/viewstyle.css">
    <title>View</title>
  </head>
  <body>
  <div class="wrapper">
      <div class="left">
        <h1>EVENT WITH ID <?php echo $idd;?>   DETAILS</h1>
      </div>
      <div class="right">
        <div class="info">
          <h3><?php echo $eventname;?></h3>

          <div class="info_data">
            <div class="data">
              <h4>Location</h4>

              <p><?php echo $eventlocation;?></p>
            </div>

            <div class="data">
              <h4>Expenses</h4>

              <p><?php echo $eventexpenses;?> EUR</p>
            </div>

            <div class="data">
              <h4>Sponsors</h4>

              <p><?php echo $eventsponsors;?></p>
            </div>
            <div class="data" >
              <h4>Participants</h4>

              <p><?php echo $eventparticipants;?></p>
            </div>


          </div>
          
        </div>
      </div>
      
</div>
<div class ="button">
        <a href="display.php"><button class='btn'>Home</button></a>
</div>
  </body>
</html>
