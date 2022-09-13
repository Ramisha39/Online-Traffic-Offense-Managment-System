<?php 

require_once('db_conn.php');

$user_name = $_POST['name'];
$name = $_POST['name'];
$id = $_POST['Id'];
$password = $_POST['psw'];
$repeat_password = $_POST['psw-repeat'];

$q = "SELECT * FROM  users WHERE name ='$user_name' && password = '$password'";

$result = mysqli_query($conn, $q);

$num = mysqli_num_rows($result);

if ($num == 1) {
	
	header("Location: signup.php");
}

else{
	$qy = "INSERT INTO `users`(`id`, `user_name`, `password`, `name`) VALUES ('$id', '$user_name', '$password', '$name')";
	mysqli_query($conn, $qy);
	header("Location: home.php");
}

?>