<?php
session_start();
$file = 'counter.txt';

// Buat file jika belum ada
if (!file_exists($file)) {
    file_put_contents($file, 0);
}

$count = (int)file_get_contents($file);

// Tambah hitungan hanya jika session baru (agar refresh tidak menambah angka)
if (!isset($_SESSION['visited'])) {
    $count++;
    file_put_contents($file, $count);
    $_SESSION['visited'] = true;
}

header('Content-Type: application/json');
echo json_encode(['count' => $count]);
?>