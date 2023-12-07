<?php
include('../config/db.php');
session_start();
if(empty($_SESSION['username'])){
	header('Location: ../index.php',true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
</head>
<body 
style="height: 100vh; width: 100vw; background-color: #f5f5f5; display: flex; flex-direction:column; justify-content: center; align-items: center;"
>
	<h1>Welcome to the dashboard</h1>

	<?php if(!empty($_SESSION['username'])){ ?>
		<h2><?php echo $_SESSION['name']; ?></h2>
		<a href="./logout.php">Logout</a>
		<br>
		<?phpinfo()?>
	<?php }else{ ?>
		<h2>You are not logged in</h2>
		<a href="../index.php">Login</a>
	<?php } ?>
</body>
</html>