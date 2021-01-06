<?php
session_start();
require 'functions.php';

// Cek session
if (!isset($_SESSION['login'])) {
	header('location: login.php');
	exit;
}

// Tentukan jumlah data
if (isset($_GET['keyword'])) {
	$jumlahData = count(searchTotal($_GET['keyword']));
} else {
	$jumlahData = count(display("SELECT * FROM bukularis"));
}

// Deklarasi variable
$jumlahDataPerHalaman = 2;
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
$awalData = ($halamanAktif - 1) * $jumlahDataPerHalaman;

// Tentukan batas awal pagination
if ($halamanAktif > 2) {
	$start_number = $halamanAktif - 2;
} else {
	$start_number = 1;
}

// Tentukan batas akhir pagination
if ($halamanAktif < ($jumlahHalaman - 2)) {
	$end_number = $halamanAktif + 2;
} else {
	$end_number = $jumlahHalaman;
}

// Display data
if (isset($_GET['keyword'])) {
	$keyword = $_GET['keyword'];
	$books = search($keyword, $awalData, $jumlahDataPerHalaman);
} else {
	$books = display("SELECT * FROM bukularis ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Buku Perpustakaan</title>
	<style>
		th {
			background-color: yellowgreen;
		}

		td {
			text-align: center;
		}

		a {
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		form {
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.active {
			text-decoration: underline;
			font-weight: bold;
		}
	</style>
</head>

<body>
	<a href="logout.php">Logout!</a>

	<h1>Daftar Buku Perpustakaan</h1>

	<a href="insert.php">Insert Data Buku</a>

	<!-- Penjelasan memakai GET karena cachable, bisa dilihat difolder gambar -->
	<form action="" method="GET">
		<input type="text" name="keyword" autofocus autocomplete="off" size="25" placeholder="Masukkan keyword pencarian">
		<button type="submit">Search!</button>
	</form>

	<!-- Jika dilakukan pencarian -->
	<?php if (isset($_GET['keyword'])) { ?>
		<!-- Previous Arrow -->
		<?php if ($halamanAktif > 1) { ?>
			<a href="?page=<?= $halamanAktif - 1; ?>&keyword=<?= $keyword; ?>">&laquo;</a>
		<?php } else { ?>
			<a href="#">&laquo;</a>
		<?php } ?>

		<!-- Number -->
		<?php for ($number = $start_number; $number <= $end_number; $number++) { ?>
			<?php if ($number == $halamanAktif) : ?>
				<a href="?page=<?= $number; ?>&keyword=<?= $keyword; ?>" class="active"><?= $number; ?></a>
			<?php else : ?>
				<a href="?page=<?= $number; ?>&keyword=<?= $keyword; ?>"><?= $number; ?></a>
			<?php endif; ?>
		<?php } ?>

		<!-- Next arrow -->
		<?php if ($halamanAktif < $jumlahHalaman) { ?>
			<a href="?page=<?= $halamanAktif + 1; ?>&keyword=<?= $keyword; ?>">&raquo;</a>
		<?php } else { ?>
			<a href="#">&raquo;</a>
		<?php } ?>
	<?php } else { ?>
		<!-- Previous Arrow -->
		<?php if ($halamanAktif > 1) { ?>
			<a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
		<?php } else { ?>
			<a href=" #">&laquo;</a>
		<?php } ?>

		<!-- Number -->
		<?php for ($number = $start_number; $number <= $end_number; $number++) { ?>
			<?php if ($number == $halamanAktif) : ?>
				<a href="?page=<?= $number; ?>" class="active"><?= $number; ?></a>
			<?php else : ?>
				<a href="?page=<?= $number; ?>"><?= $number; ?></a>
			<?php endif; ?>
		<?php } ?>

		<!-- Next arrow -->
		<?php if ($halamanAktif < $jumlahHalaman) { ?>
			<a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
		<?php } else { ?>
			<a href="#">&raquo;</a>
		<?php } ?>
	<?php } ?>

	<table border="1" cellspacing="0" cellpadding="10">
		<form action="" method="POST">
			<tr>
				<th>No</th>
				<th>Action</th>
				<th>Photo</th>
				<th>Title</th>
				<th>Author</th>
				<th>Publisher</th>
				<th>Year Of Publication</th>
			</tr>

			<?php $no = 1 + $awalData; ?>
			<?php foreach ($books as $book) { ?>
				<tr>
					<td><?= $no; ?></td>
					<td>
						<a href="edit.php?id=<?= $book['id']; ?>">Edit</a> |
						<a href="delete.php?id=<?= $book['id']; ?>" onclick="return confirm('Apakah anda yakin?');">Delete</a>
					</td>
					<td>
						<img src="img/<?= $book['foto']; ?>" alt="Foto buku" width="70">
					</td>
					<td><?= $book['judul']; ?></td>
					<td><?= $book['pengarang']; ?></td>
					<td><?= $book['penerbit']; ?></td>
					<td><?= $book['tahunterbit']; ?></td>
				</tr>
				<?php $no++; ?>
			<?php } ?>
		</form>
	</table>
</body>

</html>