<?php
$link = mysqli_connect('localhost', 'root', '', 'buku');

// Display data
function display($query)
{
	global $link;
	$result = mysqli_query($link, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

// Insert Data Buku
function insert($data)
{
	global $link;
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$tahunterbit = htmlspecialchars($data['tahunterbit']);

	$foto = upload();
	if (!$foto) {
		return false;
	}

	$query = "INSERT INTO bukularis VALUES
						(NULL, '$foto', '$judul', '$pengarang', '$penerbit', '$tahunterbit')
					 ";

	mysqli_query($link, $query);
	return mysqli_affected_rows($link);
}

// Delete data
function delete($id)
{
	global $link;

	$result = display("SELECT foto FROM bukularis WHERE id = $id");
	$location = 'img/' . $result[0]['foto'];

	if (file_exists($location)) {
		unlink($location);
	}

	mysqli_query($link, "DELETE FROM bukularis WHERE id = $id");

	return mysqli_affected_rows($link);
}

// Edit data
function edit($data)
{
	global $link;
	$id = $data['id'];
	$fotolama = $data['fotolama'];
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$tahunterbit = htmlspecialchars($data['tahunterbit']);

	if ($_FILES['foto']['error'] === 4) {
		$foto = $fotolama;
	} else {
		$foto = upload();

		$result = display("SELECT foto FROM bukularis WHERE id = $id");
		$location = 'img/' . $result[0]['foto'];

		if (file_exists($location)) {
			unlink($location);
		}
	}

	$query = "UPDATE bukularis SET
						judul = '$judul',
						pengarang = '$pengarang',
						penerbit = '$penerbit',
						tahunterbit = '$tahunterbit',
						foto = '$foto'
					 WHERE id = $id
					 ";

	mysqli_query($link, $query);
	return mysqli_affected_rows($link);
}

// Upload gambar
function upload()
{
	$fileName = $_FILES['foto']['name'];
	$fileSize = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	if ($error === 4) {
		echo "
			<script>
				alert('Pilih gambar terlebih dahulu!');
			</script>
		";
		return false;
	}

	$fileExtensionValid = ['jpg', 'jpeg', 'png'];

	$fileExtension = explode('.', $fileName);
	$fileExtension = strtolower(end($fileExtension));

	if (!in_array($fileExtension, $fileExtensionValid)) {
		echo "
			<script>
				alert('File yang anda upload bukan file gambar!');
			</script>
		";
		return false;
	}

	if ($fileSize > 1000000) {
		echo "
			<script>
				alert('File yang anda upload melebihi batas!');
			</script>
		";
		return false;
	}

	$fileNewName = uniqid() . '.' . $fileExtension;

	move_uploaded_file($tmpName, 'img/' . $fileNewName);
	return $fileNewName;
}

// Search Total Data
function searchTotal($keyword)
{
	$query = "SELECT * FROM bukularis WHERE
						judul LIKE '%$keyword%' OR
						pengarang LIKE '%$keyword%' OR
						penerbit LIKE '%$keyword%' OR
						tahunterbit LIKE '%$keyword%'
					 ";

	return display($query);
}

// Search Data dengan limit
function search($keyword, $awalData, $jumlahDataPerHalaman)
{
	$query = "SELECT * FROM bukularis WHERE
						judul LIKE '%$keyword%' OR
						pengarang LIKE '%$keyword%' OR
						penerbit LIKE '%$keyword%' OR
						tahunterbit LIKE '%$keyword%'
					 ORDER BY id DESC
					 LIMIT $awalData, $jumlahDataPerHalaman
					 ";

	return display($query);
}

// Registrasi User
function register($data)
{
	global $link;
	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($link, $data['password']);
	$password2 = mysqli_real_escape_string($link, $data['password2']);

	$result = mysqli_query($link, "SELECT username FROM users WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Username sudah digunakan!');
			</script>
		";
		return false;
	}

	if ($password !== $password2) {
		echo "
			<script>
				alert('Password tidak sesuai!');
			</script>
		";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($link, "INSERT INTO users VALUES(NULL, '$username', '$password')");
	return mysqli_affected_rows($link);
}
