<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $tanggal = $_POST['tanggal'];
    $nominal = $_POST['nominal'];

    $query = "INSERT INTO data_tabungan (tanggal, nominal) VALUES ('$tanggal', '$nominal')";
    mysqli_query($conn, $query);

    header("Location: index.php"); // Redirect kembali ke halaman utama
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Tabungan</title>
</head>
<body>

<h2>Tambah Data Tabungan</h2>

<!-- Form untuk menambahkan tabungan -->
<form method="post" action="">
    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" required>
    <label for="nominal">Nominal:</label>
    <input type="text" name="nominal" required>
    <button type="submit" name="submit">Tambah</button>
</form>

</body>
</html>