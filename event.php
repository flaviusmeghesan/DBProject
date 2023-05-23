<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $eventname=$_POST['nameevent'];
  $eventlocation=$_POST['location'];
  $eventparticipants=$_POST['nrpart'];
  $expenses = $_POST['expenses'];
  $sponsor= $_POST['sponsor'];

  $qry1 = "INSERT INTO expenses (eventname, price) VALUES ('$eventname', '$expenses')";
  $qry2 = "INSERT INTO locations (eventname, eventlocation) VALUES ('$eventname', '$eventlocation')";
  $qry3 ="INSERT INTO sponsors (eventname, sponsors) VALUES ('$eventname', '$sponsor')";
  $qry4 ="INSERT INTO  nrpart (eventname, participantsnr) VALUES ('$eventname', '$eventparticipants')";

  $qry1 = $con->query($qry1);
  $qry2 = $con->query($qry2);
  $qry3 = $con->query($qry3);
  $qry4 = $con->query($qry4);

  if ($qry1 && $qry2 && $qry3 && $qry4 ) {
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
    <title>Events manager</title>
    <link rel="stylesheet" href="./assets/updatestyle.css">
  </head>
  <body>
    <div class="container">
      <header>Add your event!</header>
      <form method="post">
      <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Enter event name"
          required
          name="nameevent"
        />
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Enter event location"
          required
          name="location"
        />
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Enter the nr of participants"
          required
          name="nrpart"
        />
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Expenses"
          required
          name="expenses"
        />
        </div>
        <div class="input-field">
        <input
          type="text"
          class="inputfield"
          placeholder="Sponsor"
          required
          name="sponsor"
        />
        </div>
        <div class="button">
        <div class="inner"></div>
        <button type="submit" class="submit-btn" name="submit">Add</button>
        </div>
      </form>
    </div>
  </body>
</html>
