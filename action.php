<?php 
session_start();
$conn = new mysqli('localhost', 'root', '', 'phpcrud');

if($conn->connect_error){
	die('Could not connect to the database!'.$conn->connect_error);
}

$update= false;
$id="";
$name="";
$email="";
$phone="";
$photo="";

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];	
	$phone=$_POST['phone'];

	$photo=$_FILES['image']['name'];
	$upload= 'uploads/'.$photo;

	$sql= "INSERT INTO crud(name, email, phone, photo)VALUES('$name', '$email', '$phone', '$upload')";
	$conn->query($sql);
	move_uploaded_file($_FILES['image']['tmp_name'], $upload);

	$_SESSION['msg']="Successfully inserted in Database!";
	$_SESSION['msg_type']="success";

	header('location:index.php');
}

if (isset($_GET['delete'])) {
	$id=$_GET['delete'];

	$sql= "SELECT * FROM crud WHERE id=$id";
	$result=$conn->query($sql);

	if(count($result)==1){
		$row = $result->fetch_array();
		$id=$row['id'];
		$name=$row['name'];
		$email=$row['email'];
		$phone=$row['phone'];
		$photo=$row['photo'];
	}	

	$imagepath= $row['photo'];
	unlink($imagepath);


	$sql= "DELETE FROM crud WHERE id=$id";
	$conn->query($sql);
	header('location:index.php');
	$_SESSION['msg']="Successfully deleted in Database!";
	$_SESSION['msg_type']="danger";

}

if (isset($_GET['edit'])) {
	$id=$_GET['edit'];

	$sql= "SELECT * FROM crud WHERE id=$id";
	$result = $conn->query($sql);

	if(count($result)==1){
		$row = $result->fetch_array();
		$id=$row['id'];
		$name=$row['name'];
		$email=$row['email'];
		$phone=$row['phone'];
		$photo=$row['photo'];
	}

	$update= true;

}

if(isset($_POST['update'])){
	$id=$_POST['id'];

	$name=$_POST['name'];
	$email=$_POST['email'];	
	$phone=$_POST['phone'];
	$oldimage=$_POST['oldimage'];

	if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
		$newimage="uploads/".$_FILES['image']['name'];
		unlink($oldimage);
		move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
	}else{
		$newimage=$oldimage;
	}

	$sql= "UPDATE crud SET name='$name', email='$email', phone='$phone', photo='$newimage' WHERE id=$id";
	$conn->query($sql);
	
	header('location:index.php');
	$_SESSION['msg']="Successfully updated in Database!";
	$_SESSION['msg_type']="primary";
	
}

if(isset($_GET['details'])){
	$id=$_GET['details'];
	$sql= "SELECT * FROM crud WHERE id=$id";
	$result = $conn->query($sql);
	if(count($result)==1){
		$row=$result->fetch_array();
		$name=$row['name'];
		$email=$row['email'];	
		$phone=$row['phone'];
		$photo=$row['photo'];
	}
	
}



?>
