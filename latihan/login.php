<?php
session_start();
require 'functions.php';

// Cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($link, "SELECT username FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

// Cek session
if (isset($_SESSION['login'])) {
	header('location: index.php');
	exit;
}

// Validasi login
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);

		if (password_verify($password, $row['password'])) {
			if (isset($_POST['remember'])) {
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}

			$_SESSION['login'] = true;

			header('location: index.php');
			exit;
		}
	}
	$error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Login</title>
	<style>
		li {
			list-style-type: none;
		}

		label {
			display: block;
		}

		input {
			margin-top: 10px;
		}

		button {
			margin-top: 20px;
		}

		.remember {
			display: inline;
		}

		p {
			color: red;
		}
	</style>
</head>

<body>
	<h1>Form Login</h1>

	<?php if (isset($error)) { ?>
		<p>Username atau Password Salah!</p>
	<?php } ?>

	<form action="" method="POST">
		<ul>
			<li>
				<label for="username">Username : </label>
				<input type="text" id="username" name="username" autofocus required>
			</li>
			<li>
				<label for="password">Password : </label>
				<input type="password" id="password" name="password" required>
			</li>
			<li>
				<input type="checkbox" id="remember" name="remember">
				<label for="remember" class="remember">Remember me</label>
			</li>
			<li>
				<button type="submit" name="login">login!</button>
			</li>
		</ul>
	</form>
</body>

</html>