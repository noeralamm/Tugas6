<?php
// untuk deklarasi nama server, username, dan password
$servername="localhost";
$username="root";
$password="";
$dbname="pegawai";

// untuk membuat koneksi
$conn = mysqli_connect($servername, $username, $password);

// untuk mengecek koneksi
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

// untuk membuat database
$sql= "CREATE DATABASE pegawai";
if(mysqli_query($conn, $sql)){
    echo "Database created succesfully<br>";
} else{
    echo "Error creating database<br>". mysqli_error($conn);
}

// untuk menghentikan koneksi
mysqli_close($conn);

// untuk membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// untuk membuat table
$sql= "CREATE TABLE data_pegawai(
id_pegawai VARCHAR(12) PRIMARY KEY,
nama VARCHAR(200) NOT NULL,
alamat VARCHAR(200) NOT NULL,
NIK VARCHAR(50) NOT NULL,
telp VARCHAR(200) NOT NULL
)";
if(mysqli_query($conn, $sql)){
	echo "Table created succesfully<br>";
} else{
	echo "Error creating table<br>". mysqli_error($conn);
}

// untuk menghentikan koneksi
mysqli_close($conn);
?>