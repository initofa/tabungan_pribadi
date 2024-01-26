<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db_tabungan"; 

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);


// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
