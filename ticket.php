<?php 

$conn = new mysqli('localhost', 'root', '', 'phpcrud');

if(isset($_POST['submit'])){
	$date1=$_POST['date1'];
	$date2=$_POST['date2'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$destination= $from." to ".$to;

$sql= "SELECT * FROM ticket WHERE destination = $destination ";

$result=$conn->query($sql);
$row= $result->fetch_assoc();

print_r($row);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ticket Booking System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Ticket Booking system</h1>
			<hr>
		<div class="row">
<!-- <?php 
$sql= "SELECT * FROM ticket";
	$result=$conn->query($sql);
?> -->

			<div class="col-md-4">
				<h4>ticket booking form</h4>

				<form action="ticket.php" method="post">
				<input type="hidden" name="id" > 
				<div class="form-group">
					<input type="date" name="date1"  class="form-control"  required>
				</div>
				<div class="form-group">
					<input type="date" name="date2"  class="form-control"  required>
				</div>
				
				<label for="">From</label>
				<select name="from" id="">
					<option value="dhaka">dhaka</option>
					<!-- <option value="chandpur">chandpur</option>
					<option value="borishal">borishal</option> -->
				</select>
				
				<label for="">To</label>
				<select name="to" id="">
					<!-- <option value="dhaka">dhaka</option> -->
					<option value="chandpur">chandpur</option>
					<option value="borishal">borishal</option>
				</select>

				<div class="form-group">
					<input type="text" name="ticket_value" class="form-control">
				</div>

				
				<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
				
			</form>
				
			</div>
			<div class="col-md-8">
	<!-- 		<?php 
while($row= $result->fetch_assoc()) {; 
?>

<h1><?php echo $row['ticket_value']; ?></h1>	

<?php } ?>	 -->
			</div>
		</div>
	
	</div>
</body>
</html>