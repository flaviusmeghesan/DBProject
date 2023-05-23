<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql1 = "SELECT * FROM locations WHERE id = $id";
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_assoc($result1);

$eventname = $row['eventname'];
$eventlocation = $row['eventlocation'];

$sql2 = "SELECT * FROM nrpart WHERE idnrpart = $id";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$eventparticipants = $row2['participantsnr'];

$sql3 = "SELECT * FROM sponsors WHERE idsponsors = $id";
$result3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_assoc($result3);
$eventsponsors = $row3['sponsors'];

$sql4 = "SELECT * FROM expenses WHERE idexpenses = $id";
$result4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_assoc($result4);
$eventexpenses = $row4['price'];

if(isset($_POST['submit'])){
  $eventname=$_POST['nameevent'];
  $eventlocation=$_POST['location'];
  $eventparticipants=$_POST['nrpart'];
  $eventsponsors=$_POST['sponsors'];
  $eventexpenses=$_POST['expenses'];

  
  $qry1 = "UPDATE locations 
  SET 
    eventname='$eventname',
    eventlocation='$eventlocation'
    WHERE id=$id
    ";

  $qry1 = $con->query($qry1);

  $qry2 = "UPDATE nrpart 
  SET 
    eventname='$eventname',
    participantsnr='$eventparticipants'
    WHERE idnrpart=$id
    ";

  $qry2 = $con->query($qry2);

  $qry3 = "UPDATE sponsors 
  SET 
    eventname='$eventname',
    sponsors='$eventsponsors'
    WHERE idsponsors=$id
    ";

  $qry3 = $con->query($qry3);


  $qry4 = "UPDATE expenses 
  SET 
    eventname='$eventname',
    price='$eventexpenses'
    WHERE idexpenses=$id
    ";

  $qry4 = $con->query($qry4);


  if ($qry1 && $qry2 && $qry3 && $qry4) {
    header('location: display.php');
    
  }else{
    die(mysqli_error($con));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/updatestyle.css">
    <title>Update</title>
  </head>
  <body>
    
    <div class="container">
    <header>Update event with ID <?php echo $id?>!</header>
      <form method="post">
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Enter event name"
          required
          name="nameevent"
          value = <?php
          echo $eventname;
          ?>
        />
        <label>Name</label>
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Enter event location"
          required
          name="location"
          value = <?php
          echo $eventlocation;
          ?>
        />
        <label>Location</label>
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Enter the nr of participants"
          required
          name="nrpart"
          value = <?php
          echo $eventparticipants;
          ?>
        />
        <label>No. of participants</label>
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Expenses"
          required
          name="expenses"
          value = <?php
          echo $eventexpenses;
          ?>
        />
        <label>Expenses</label>
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Sponsors"
          required
          name="sponsors"
          value = <?php
          echo $eventsponsors;
          ?>
        />
        <label>Sponsors</label>
      </div>
      <div class="button">
        <div class="inner"></div>
        <button type="submit" class="submit-btn" name="submit">Update</button>
</div>
      </form>
    </div>
  </body>
</html>
