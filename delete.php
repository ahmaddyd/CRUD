<?php
$json_file = 'transaksi.json';
$json_data = file_get_contents($json_file);

$data = json_decode($json_data);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $index = -1;
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]->ID == $id) {
            $index = $i;
            break;
        }
    }

    if ($index != -1) {
        array_splice($data, $index, 1);

        $json_data = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents($json_file, $json_data);
    }

    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>