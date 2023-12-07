<?php

include('./config/db.php');
session_start();
$err = '';
if(!empty($_SESSION['username'])){
	header('Location: ./dashboard/');
}

if(isset($_POST['submit'])){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	$sql = "SELECT * FROM users WHERE username = '$username'";

	$result = mysqli_query($conn, $sql);

	$user = mysqli_fetch_assoc($result);

	if(password_verify($password, $user['password'])){
		//store data in session
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $user['name'];
		header('Location: ./dashboard/',true, 301);
		//echo $_SESSION['username'];
	} else {
		$err = 'Incorrect username or password';
		// echo 'Incorrect username or password';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SNA | Login</title>
</head>
<body
 style="width: 100dvw; height: 100dvh; background-color: #f5f5f5; display: flex; flex-direction:column; justify-content: center; align-items: center;"
>
<h2>Login</h2>
<h4> Login into your account to continue </h4>
<form action="./" method="post" style="display: flex; flex-direction:column; gap:1rem;">
<div>
	<label for="username">Username:</label>
		<input type="text" name="username" placeholder="Username..." required/>
</div>
<div>
	<label for="password">Password:</label>
	<input type="password" name="password" placeholder="Password..." required/>
</div>
<?php if(!empty($err)){ ?>
	<p style="color: red;"><?php echo $err; ?></p>
<?php } ?>
	<input type="submit" name="submit" value="Login"/>
</form>

<a href="./register.php">Don't have an account?</a>
<p>&copy; 2023 Benjamin.</p>
	
</body>
</html>