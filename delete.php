<?php
include 'koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Perintah SQL untuk menghapus data berdasarkan id
    $query = "DELETE FROM data_tabungan WHERE id=$id";
    
    // Eksekusi perintah SQL
    mysqli_query($conn, $query);

    header("Location: index.php"); // Redirect kembali ke halaman utama
    exit();
}
?>