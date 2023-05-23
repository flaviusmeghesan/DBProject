<?php
include 'connect.php';
$word = $_GET['query'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="Stylesheet" href="./assets/searchstyle.css">
	<title>Search</title>
</head>
<body>
	<h1><span class="pink"></span>SEARCH <span class="yellow">RESULTS</pan></h1>
		<h2>FOR "<?php echo $word;?>"</h2>
		
		<table class="container">
			<thead>
				<tr>
					<th><h1>Event ID</h1></th>
					<th><h1>Event Name</h1></th>
					<th><h1>Event location</h1></th>
					<th><h1>Number of participants</h1></th>
					<th><h1>Expenses</h1></th>
					<th><h1>Sponsors</h1></th>
          <th><h1>Operations</h1></th>
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
					<td id='operations'><a href='update.php?updateid=$id'><button id='update'>Update</button></a>
					<a href='delete.php?deleteid=$id'><button id='delete'>Delete</button></a>
					<a href='view.php?viewid=$id'><button id='view'>View</button></a></td>
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
    <div class="buttonxd"><a href="display.php"><button class='btn'>Home</button></a></div>
    
</body>
</html>