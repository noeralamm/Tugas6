<?php
// Deklarasi nama server, username, password, dan database
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
// Mengambil data pegawai sesuai id di url
$sql= "SELECT * FROM data_pegawai WHERE id_pegawai=$_GET[id]";
$result= mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<body>
<h1>Ubah Data</h1>
<!-- Membuat form untuk mengubah data -->
<form method="POST" action="#">
	<table width="400" cellpadding="2" cellspacing="2">
		<tr>
			<td width="130">ID</td>
			<td><input type="text" name="id_pegawai" value="<?php echo $row['id_pegawai'] ?>" required></td>
		</tr>
		<tr>
			<td width="130">Nama</td>
			<td><input type="text" name="nama" value="<?php echo $row['nama'] ?>" required></td>
		</tr>
		<tr>
			<td width="130">Alamat</td>
			<td><input type="text" name="alamat" value="<?php echo $row['alamat']?>" required></td>
		</tr>
		<tr>
			<td width="130">NIK</td>
			<td><input type="text" name="nik" value="<?php echo $row['NIK']?>" required></td>
		</tr>
		<tr>
			<td width="130">Telepon</td>
			<td><input type="text" name="telepon" value="<?php echo $row['telp']?>" required></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="btnUbah" value="Ubah">
			</td>
		</tr>
	</table>
</form>
<!-- Kembali ke tugas3.php -->
<form action="tugas3.php">
    <input type="submit" value="Batal" />
</form>
</body>
</html>	
<?php
// Deklarasi nama server, username, password, dan database
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

if(isset($_POST['btnUbah'])){

	// Memperbarui data
	$sql= "UPDATE data_pegawai SET id_pegawai='$_POST[id_pegawai]', nama='$_POST[nama]', alamat='$_POST[alamat]', NIK='$_POST[nik]', telp='$_POST[telepon]'";
	if(mysqli_query($conn, $sql)){
		echo "Data berhasil diubah";
		//pindah ke tugas3.php
		echo "<meta HTTP-EQUIV='REFRESH' content='1; url=tugas3.php'>";
	} else{
		echo "Error: ". $sql ."<br>". mysqli_error($conn);
	}
	// Menutup koneksi
	mysqli_close($conn);	
}

?>