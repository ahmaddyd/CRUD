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

    foreach ($data as $index => $transaction) {
        if ($transaction->ID == $id) {
            $data[$index]->Nominal = $nominal;
            $data[$index]->Jenis = $jenis;
            $data[$index]->Tanggal = $tanggal;
        }
    }

    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents($json_file, $json_data);

    header("Location: index.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Find the transaction in the array
    foreach ($data as $transaction) {
        if ($transaction->ID == $id) {
            $nominal = $transaction->Nominal;
            $jenis = $transaction->Jenis;
            $tanggal = $transaction->Tanggal;
        }
    }
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Transaksi</title>
    <link rel="stylesheet" href="css/update.css">
</head>

<body>
    <form action="update.php" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $transaction->ID; ?>" readonly>

        <label for="nominal">Nominal:</label>
        <input type="text" id="nominal" name="nominal" value="<?php echo $transaction->Nominal; ?>">

        <label for="jenis">Jenis:</label>
        <input type="text" id="jenis" name="jenis" value="<?php echo $transaction->Jenis; ?>">

        <label for="tanggal">Tanggal:</label>
        <input type="text" id="tanggal" name="tanggal" value="<?php echo $transaction->Tanggal; ?>">

        <input type="submit" name="submit" value="Update">
    </form>