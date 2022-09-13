<!DOCTYPE html>
<html>
	<?php
		if(isset($_GET['user_name'])){
			header("location: home.php");
		}
	?>
<?php
include_once './partials/head.php';
?>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="indexBody" >
	<h1> <b> ONLINE TRAFFIC OFFENSE MANAGEMENT SYSTEM </b> </h1>
	
     <form style="margin:4rem;" action="login.php" method="post" >
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
	 <div class="clearfix">
      	<button onclick="document.location='signup.php'">Don't Have an Account?</button>
    	</div>
</body>
</html>