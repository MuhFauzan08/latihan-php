<?php
session_start();
require 'functions.php';

// Cek session
if (!isset($_SESSION['login'])) {
	header('location: login.php');
	exit;
}

// Delete data
$id = $_GET['id'];
if (delete($id) > 0) {
	echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href = 'index.php'
			</script>
		";
} else {
	echo "
			<script>
				alert('Data gagal dihapus!');
			</script>
		";
}
