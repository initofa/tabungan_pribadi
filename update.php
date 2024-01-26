<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $nominal = $_POST['nominal'];

    $query = "UPDATE data_tabungan SET tanggal='$tanggal', nominal='$nominal' WHERE id=$id";
    mysqli_query($conn, $query);

    header("Location: index.php"); // Redirect kembali ke halaman utama
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM data_tabungan WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tabungan</title>
    <style>
        .action-buttons .edit-btn {
    background-color: #28a745;
}
    </style>
</head>
<body>

<h2>Edit Data Tabungan</h2>

<!-- Form untuk mengedit tabungan -->
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
    <label for="nominal">Nominal:</label>
    <input type="text" name="nominal" value="<?php echo $row['nominal']; ?>" required>
    <button type="submit" name="submit">Update</button>
</form>

</body>
</html>