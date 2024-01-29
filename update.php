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
  body {
    font-family: Arial, sans-serif;
    background-color: #C0C0C0;
    color: #333;
    margin: 0;
    padding: 0;
}

h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #666;
}

input[type="date"],
input[type="text"],
button[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #43a047;
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