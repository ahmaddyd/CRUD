<?php
$json = file_get_contents('transaksi.json');
$data = json_decode($json, true);
$saldo = 0;

foreach ($data as $item) {
    if ($item['Jenis'] == 'Debet') {
        $saldo -= (int) preg_replace("/[^0-9]/", "", $item['Nominal']);
    } else {
        $saldo += (int) preg_replace("/[^0-9]/", "", $item['Nominal']);
    }
}

echo "Jumlah sado: Rp. " . number_format($saldo);
?>