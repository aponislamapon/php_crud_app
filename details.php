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
			

		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-md-6 mt-3 bg-info p-4 rounded">
					<h1 class="bg-primary rounded text-center text-light">ID : <?= $id; ?></h1>
					<div class="text-center">
						<img src="<?= $photo; ?>" width="300" class="img-thumbnail">
					</div>
					<h4 class="text-light">Name : <?= $name; ?></h4>
					<h4 class="text-light">Email : <?= $email; ?></h4>
					<h4 class="text-light">Phone : <?= $phone; ?></h4>
				</div>
			</div>
		</div>







</body>
</html>
