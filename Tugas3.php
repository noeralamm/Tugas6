<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai</title>
</head>
<body>
<center><h1>DATA PEGAWAI</h1></center>
<?php
// mendeklarasi nama server, nama user, password, dan database
$servername="localhost";
$username="root";
$password="";
$dbname="pegawai";

// untuk membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

// mengambil semua data dari table pegawai
$sql= "SELECT * FROM data_pegawai";
$result= mysqli_query($conn, $sql);

// jika ada data
if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)) {
		echo "================================";
		echo "<br>";
		echo "ID: ". $row["id_pegawai"] ."<br>Nama: ". $row["nama"] ."<br>Alamat: ". $row["alamat"] ."<br>NIK: ". $row["NIK"] ."<br>Nomor Telepon: ". $row["telp"] ."<br>";
		echo "<tr>
		<td><a href='editdata.php?id=$row[id_pegawai]'>Edit</a></td>
		&emsp;|&emsp;
		<td><a href='?id=$row[id_pegawai]'>Hapus</a></td>
		</tr><br>";
}
} else{
	echo "Data tidak ditemukan";
}

// untuk pindah ke halaman tambah data
echo"<br><br><form action='inputdatadb.php'><input type='submit' name='btnTambah' value='Tambah Data'></form>";

mysqli_close($conn);
?>
</body>
</html>
<?php
// untuk mendeklarasi nama server, nama user, password, dan database
$servername="localhost";
$username="root";
$password="";
$dbname="pegawai";

// untuk membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// untuk mengecek koneksi
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

if(isset($_GET['id'])){

	// menghapus data pegawai sesuai id yang dipilih
	$sql= "DELETE FROM data_pegawai WHERE id_pegawai='$_GET[id]'";
	if(mysqli_query($conn, $sql)){
		echo "Data telah berhasil dihapus";
		// membuka kembali tugas3.php
		echo "<meta HTTP-EQUIV='REFRESH' content='1; url=tugas3.php'>";
	} else{
		echo "Error: ". $sql ."<br>". mysqli_error($conn);
	}
	// Menutup koneksi
	mysqli_close($conn);	
}

?>