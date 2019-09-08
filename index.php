<?php 
include 'action.php';
$conn = new mysqli('localhost', 'root', '', 'phpcrud');

 if($conn->connect_error){
 	die('Could not connect to the database!'.$conn->connect_error);
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- <style>
		.abc{
			background:url(abc.jpg); no-repeat;
			background-position-x: 0%; 
			background-position-y: 0%; 
			background-size: 100% 730px; 
		}
	</style> -->
</head>
<body >


		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		  <!-- Brand -->
		  <a class="navbar-brand" href="index.php">PHP CRUD</a>

		  <!-- Toggler/collapsibe Button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <!-- Navbar links -->
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		      <!-- <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>  -->
		    </ul>
		  </div>
		  <form class="form-inline" action="/action_page.php">
		    <input class="form-control mr-sm-2" type="text" placeholder="Search">
		    <button class="btn btn-success" type="submit">Search</button>
		  </form> 
		</nav>


	<div class="container-fulid">
		<div class="row justify-content-center">
			<div class="col-md-10 ">
				<h2 style="text-align: center;" class="text-dark mt-4">Advanced Php Curd application with bootstrap 4</h2>
				<hr>
				<?php if(isset($_SESSION['msg'])){ ?>
				<div class="alert alert-<?= $_SESSION['msg_type'];?> alert-dismissable text-center">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?= $_SESSION['msg']; ?>
				</div>	
				<?php } unset($_SESSION['msg']); ?>
			</div>			
		</div>
		<div class="row ml-2 mr-2">
		<div class="col-md-4">
			<h4 class="text-center text-dark">Add Record </h4>
			<form action="action.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $id; ?>"> 
				<div class="form-group">
					<input type="text" name="name" value="<?= $name ;?>" class="form-control" placeholder="Enter Name" required>
				</div>
				<div class="form-group">
					<input type="email" name="email" value="<?= $email ;?>" class="form-control" placeholder="Enter Email" required>
				</div>
				
				<div class="form-group">
					<input type="tel" name="phone" value="<?= $phone ;?>" class="form-control" placeholder="Enter Number" required>
				</div>
				<div class="form-group">
					<input type="hidden" name="oldimage" value="<?= $photo; ?>">
					<input type="file" name="image">
					<?php if($update==true){ ?>
					<img src="<?= $photo; ?> " width="120" class="img-thumbnail" >
					<?php } ?>
				</div>

				<?php if($update==true){ ?>
					<input type="submit" name="update" value="Update record" class="btn btn-primary btn-block">
				<?php }else{ ?>
				<input type="submit" name="submit" value="Add record" class="btn btn-success btn-block">
				<?php } ?>
			</form>
		</div>
		<div class="col-md-8">
			<h4 style="text-align: center;">Records In Database</h4>
			<table class="table table-hover">

				<?php

					$sql= "SELECT * FROM crud";
					$run = $conn->query($sql);


				 ?>
			    <thead>

			    	
			      <tr>
			        <th>ID</th>
			        <th>Image</th>
			        <th>Name</th>
			        <th>Email</th>			        
			        <th>Phone</th>
			        <th>Action</th>
			      </tr>
			 
			    </thead>
			    <tbody>
			    	<?php 
			    		while ($row= $run->fetch_assoc()) {
			    	?>
			      <tr>
			        <td><?php echo $row['id']; ?></td>
			        <td><img src="<?php echo $row['photo']; ?>" width="30" ></td>
			        <td><?php echo $row['name']; ?></td>
			        <td><?php echo $row['email']; ?></td>			        
			        <td><?php echo $row['phone']; ?></td>
			        <td style="width: 20%;">
			        	<a href="details.php?details=<?php echo $row['id']; ?>" class="badge badge-primary">Details</a>
			        	<a href="index.php?edit=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
			        	<a href="action.php?delete=<?php echo $row['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure to delete this')">Delete</a>
			        </td>
			      </tr>	
			       <?php } ?>		  
			    </tbody>
			  </table>
		</div>
		</div>

	</div>
		












	
	<script type="text/javascript">	
		$(document).ready(function(){
			setTimeout(function(){
				$(".alert").remove();
			}, 3000);
		});
	</script>
</body>
</html>