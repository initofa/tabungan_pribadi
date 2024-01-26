<?php
include 'koneksi.php';

$query = "SELECT * FROM data_tabungan";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabungan pribadi</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    color: #333;
    font-size: 28px;
    margin-bottom: 20px;
}

a {
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.action-buttons a {
    margin-right: 5px;
    padding: 5px 10px;
    color: #fff;
    border-radius: 3px;
    text-decoration: none;
}

.action-buttons .edit-btn {
    background-color: #28a745; /* Tombol Edit berwarna hijau */
}

.action-buttons .delete-btn {
    background-color: #dc3545; /* Tombol Delete berwarna merah */
}

.action-buttons a:hover {
    opacity: 0.8;
}

/* Menyesuaikan warna tombol tambahan */
.additional-buttons .custom-btn {
    background-color: #6c757d; /* Warna abu-abu untuk tombol tambahan */
}

.additional-buttons .custom-btn:hover {
    opacity: 0.8;
}

    </style>
</head>

<body>

<h2>Tabungan Pribadi</h2>
<a href="create.php">Menabung</a>
<!-- Tabel untuk menampilkan daftar tabungan -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Nominal</th>
        <th>Action</th> 
    </tr>

    <?php
     // Menampilkan daftar tabungan dalam tabel
     $total = 0;

     // Menampilkan daftar tabungan dalam tabel
     while ($row = mysqli_fetch_assoc($result)) {
         // Menambahkan nominal ke total
         $total += $row['nominal'];
     
         // Menampilkan baris data dalam tabel
         echo "<tr>";
         echo "<td>".$row['id']."</td>";
         echo "<td>".$row['tanggal']."</td>";
         // Memformat nominal dengan titik sebagai pemisah ribuan
         echo "<td>".number_format($row['nominal'], 2, ',', '.')."</td>";
         echo "<td>";
         echo "<div class='action-buttons additional-buttons'>";
         // Tambahkan tombol edit dengan link ke update.php
         echo "<a href='update.php?id=".$row['id']."'>Edit</a>";
         echo " | ";
         // Tambahkan tombol delete dengan link ke delete.php
         echo "<a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Delete</a>";
         echo "</td>";
         echo "</tr>";
     }
     
     // Menampilkan jumlah total tabungan di baris terakhir
     echo "<tr>";
     echo "<td colspan='2'><strong>Total tabungan anda sekarang</strong></td>";
     echo "<td><strong>".number_format($total, 2, ',', '.')."</strong></td>";
     echo "<td></td>";
     echo "</tr>";
    ?>
</table>


</body>
</html>
