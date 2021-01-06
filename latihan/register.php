<?php
require 'functions.php';

if (isset($_POST['register'])) {
	if (register($_POST) > 0) {
		echo "
			<script>
				alert('User berhasil ditambahkan!');
				document.location.href = 'login.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('User gagal ditambahkan!');
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Registrasi</title>
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
	</style>
</head>

<body>
	<h1>Form Registrasi</h1>

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
				<label for="password2">Confirm Password : </label>
				<input type="password" id="password2" name="password2" required>
			</li>
			<li>
				<button type="submit" name="register">Register!</button>
			</li>
		</ul>
	</form>
</body>

</html>