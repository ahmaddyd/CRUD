<?php
$json_file = 'transaksi.json';
$json_data = file_get_contents($json_file);
$data = json_decode($json_data);

echo '<table>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Nominal</th>';
echo '<th>Jenis</th>';
echo '<th>Tanggal</th>';
echo '<th>Actions</th>';
echo '</tr>';

foreach ($data as $transaction) {
  echo '<tr>';
  echo '<td>' . $transaction->ID . '</td>';
  echo '<td>' . $transaction->Nominal . '</td>';
  echo '<td>' . $transaction->Jenis . '</td>';
  echo '<td>' . $transaction->Tanggal . '</td>';
  echo '<td>';
  echo '<a href="insert.php?id=' . $transaction->ID . '">Insert</a>';
  echo '<a href="update.php?id=' . $transaction->ID . '">Update</a>';
  echo '<a href="delete.php?id=' . $transaction->ID . '">Delete</a>';
  echo '<a href="saldo.php?id=' . $transaction->ID . '">Saldo</a>';
  echo '</td>';
  echo '</tr>';
}

echo '</table>';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tabel Transaksi</title>
    <link rel="stylesheet" href="css/index.css">
</head>