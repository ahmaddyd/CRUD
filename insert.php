<?php
$json_file = 'transaksi.json';
$json_data = file_get_contents($json_file);

$data = json_decode($json_data);

if (isset($_POST['submit'])) {
    // Get the form data
    $id = $_POST['id'];
    $nominal = $_POST['nominal'];
    $jenis = $_POST['jenis'];
    $tanggal = $_POST['tanggal'];

    // Create a new transaction object
    $transaction = new stdClass();
    $transaction->ID = $id;
    $transaction->Nominal = $nominal;
    $transaction->Jenis = $jenis;
    $transaction->Tanggal = $tanggal;

    $data[] = $transaction;

    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents($json_file, $json_data);

    header("Location: index.php");
}
?>
<form action="insert.php" method="post">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id">

    <label for="nominal">Nominal:</label>
    <input type="text" id="nominal" name="nominal">

    <label for="jenis">Jenis:</label>
    <input type="text" id="jenis" name="jenis">

    <label for="tanggal">Tanggal:</label>
    <input type="text" id="tanggal" name="tanggal">

    <input type="submit" name="submit" value="Insert">
</form>
<!DOCTYPE html>
<html>

<head>
    <title>Insert Transaksi</title>
    <link rel="stylesheet" href="css/insert.css">
</head>