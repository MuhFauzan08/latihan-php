<?php
session_start();
require 'functions.php';

// Cek session
if (!isset($_SESSION['login'])) {
	header('location: login.php');
	exit;
}

// Insert data
if (isset($_POST['insert'])) {
	if (insert($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal ditambahkan!');
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
	<title>Insert Data Buku</title>
</head>

<body>
	<h1>Insert Data Buku</h1>

	<table border="0" cellspacing="0" cellpadding="10">
		<form action="" method="POST" enctype="multipart/form-data">
			<tr>
				<td>
					<label for="judul">Title : </label>
				</td>
				<td>
					<input type="text" id="judul" name="judul" autofocus required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="pengarang">Author : </label>
				</td>
				<td>
					<input type="text" id="pengarang" name="pengarang" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="penerbit">Publisher : </label>
				</td>
				<td>
					<input type="text" id="penerbit" name="penerbit" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="tahunterbit">Year Of Publication : </label>
				</td>
				<td>
					<input type="number" id="tahunterbit" name="tahunterbit" required>
				</td>
			</tr>
			<tr>
				<td>
					<label for="foto">Photo : </label>
				</td>
				<td>
					<input type="file" id="foto" name="foto">
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="insert">Insert!</button>
				</td>
			</tr>
		</form>
	</table>
</body>

</html>