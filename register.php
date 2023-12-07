<?php 
include('./config/db.php');
session_start();
if(!empty($_SESSION['username'])){
	header('Location: ./dashboard/');
}

if(isset($_POST['submit'])){
	$name = htmlspecialchars( $_POST['name']);
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	//hash password
	$hPassword = password_hash($password, PASSWORD_DEFAULT);

	$sql = "INSERT INTO users(name, username, password) VALUES('$name', '$username', '$hPassword')";

	if(mysqli_query($conn, $sql)){
		//store data in session
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $name;
		header('Location: ./dashboard/',true, 301);
	} else {
		echo 'Query error: ' . mysqli_error($conn);
	}
}

?>

<!-- Create a register page -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=
		device-width, initial-scale=1.0">
	<title>SNA | Register</title>
</head>
<body
	style="width: 100dvw; height: 100dvh; background-color: #f5f5f5; display: flex; flex-direction:column; justify-content: center; align-items: center;"
>
<h2>Register</h2>
<h4> Register for an account to continue </h4>
<form action="./register.php" method="post" style="display: flex; flex-direction:column; gap:1rem;">

<div>
	<label for="name">Full Name:</label>
	<input type="text" name="name" placeholder="Full Name..." required/>
</div>

<div>
	<label for="username">Username:</label>
		<input type="text" name="username" placeholder="Username..." required/>
</div>
<div>
	<label for="password">Password:</label>
	<input type="password" name="password" placeholder="Password..." required/>
</div>
	<input type="submit" name="submit" value="Register"/>
</form>
<a href="./index.php">Already have an account?</a>
<p>&copy; 2023 Benjamin.</p>

</body>
</html>
