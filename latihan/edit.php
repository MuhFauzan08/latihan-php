<?php
session_start();
require 'functions.php';

// Cek session
if (!isset($_SESSION['login'])) {
	header('location: login.php');
	exit;
}

// Display data
$id = $_GET['id'];
$display = display("SELECT * FROM bukularis WHERE id = $id")[0];

// Edit data
if (isset($_POST['edit'])) {
	if (edit($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah!');
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
	<title>Edit Data Buku</title>
</head>

<body>
	<h1>Edit Data Buku</h1>

	<table border="0" cellspacing="0" cellpadding="10">
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $display['id']; ?>">
			<input type="hidden" name="fotolama" value="<?= $display['foto']; ?>">
			<tr>
				<td>
					<label for="judul">Title : </label>
				</td>
				<td>
					<input type="text" id="judul" name="judul" autofocus required value="<?= $display['judul']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="pengarang">Author : </label>
				</td>
				<td>
					<input type="text" id="pengarang" name="pengarang" required value="<?= $display['pengarang']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="penerbit">Publisher : </label>
				</td>
				<td>
					<input type="text" id="penerbit" name="penerbit" required value="<?= $display['penerbit']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="tahunterbit">Year Of Publication : </label>
				</td>
				<td>
					<input type="number" id="tahunterbit" name="tahunterbit" required value="<?= $display['tahunterbit']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label for="foto">Photo : </label>
				</td>
			</tr>
			<tr>
				<td>
					<img src="img/<?= $display['foto'] ?>" alt="Foto buku" width="60">
				</td>
			</tr>
			<tr>
				<td>
					<input type="file" id="foto" name="foto">
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="edit">Edit!</button>
				</td>
			</tr>
		</form>
	</table>
</body>

</html>