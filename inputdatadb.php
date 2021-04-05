<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
</head>
<body>
<h1>INPUT DATA BARU</h1>
<!-- Membuat form data pegawai -->
<form method="POST" action="#">
	<table width="400" cellpadding="2" cellspacing="2">
		<tr>
			<td width="130">ID</td>
			<td><input type="text" name="id_pegawai" required></td>
		</tr>
		<tr>
		<tr>
			<td width="130">Nama</td>
			<td><input type="text" name="nama" required></td>
		</tr>
		<tr>
			<td width="130">Alamat</td>
			<td><input type="text" name="alamat" required></td>
		</tr>
		<tr>
			<td width="130">NIK</td>
			<td><input type="text" name="nik" required></td>
		</tr>
		<tr>
		<tr>
			<td width="130">Telepon</td>
			<td><input type="text" name="telepon" required></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btnSimpan" value="Simpan">
				<input type="reset" name="btnReset" value="Reset">
			</td>
		</tr>
	</table>
</form>
<!-- Ketika button batal di klik akan berpindah ke tugas3.php -->
<form action="tugas3.php">
    <input type="submit" value="Batal" />
</form>
</body>
</html>
<?php
// untuk deklarasi nama server, nama user, password, dan database
$servername="localhost";
$username="root";
$password="";
$dbname="pegawai";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

// jika btnSimpan diklik
if(isset($_POST['btnSimpan'])){

	// Membuat data
	$sql= "INSERT INTO data_pegawai VALUES ('$_POST[id_pegawai]', '$_POST[nama]', '$_POST[alamat]','$_POST[nik]', '$_POST[telepon]')";
	if(mysqli_query($conn, $sql)){
		echo "New record created succesfully";
		// pindah ke tugas3.php
		echo "<meta HTTP-EQUIV='REFRESH' content='1; url=tugas3.php'>";
	} else{
		echo "Error: ". $sql ."<br>". mysqli_error($conn);
	}
	// menutup koneksi
	mysqli_close($conn);	
}

?>