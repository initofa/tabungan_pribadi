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
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
background-color: #C0C0C0;
color: #333;
margin: 0;
padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
    text-align:center;
}

a {
    text-decoration: none;
    color: #fff;
}

a.btn-menabung {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-left: 15%; 
}

a.btn-menabung:hover {
    background-color: #43a047;
}

table {
    border-collapse: collapse;
    margin-top: 20px;
    width: 70%;
    margin: 20px auto; 
    text-align: center;
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(50px);
}

table th, table td {
    padding: 10px;
    border: 2px solid #333;
}

table th {
    background-color: #4682B4;
    font-weight: bold;
    color: #fff;
}

.action-buttons a {
    margin-right: 5px;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
}

.action-buttons .edit-btn {
    background-color: #FFA500;
    color: #fff;
}

.action-buttons .delete-btn {
    background-color: #FF0000;
    color: #fff;
}

.action-buttons a:hover {
    opacity: 0.8;
}

.additional-buttons .custom-btn {
    background-color: #78909c;
    color: #fff;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
}

.additional-buttons .custom-btn:hover {
    opacity: 0.8;
}
   </style>
</head>

<body>

<h2>Tabungan Pribadi</h2>
<a href="create.php" class="btn-menabung">Menabung</a>
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
         echo "<td>Rp ".number_format($row['nominal'], 2, ',', '.')."</td>";
         echo "<td>";
         echo "<div class='action-buttons additional-buttons'>";
         // Tambahkan tombol edit dengan link ke update.php
         echo "<a href='update.php?id=".$row['id']."' class='edit-btn'>Edit</a>";
         echo " | ";
         // Tambahkan tombol delete dengan link ke delete.php
         echo "<a href='delete.php?id=".$row['id']."' class='delete-btn' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Delete</a>";
         echo "</td>";
         echo "</tr>";
     }
     
     // Menampilkan jumlah total tabungan di baris terakhir
     echo "<tr>";
     echo "<td colspan='2'><strong>Total tabungan anda sekarang</strong></td>";
     echo "<td><strong>Rp ".number_format($total, 2, ',', '.')."</strong></td>";
     echo "<td></td>";
     echo "</tr>";
    ?>
</table>


</body>
</html>
