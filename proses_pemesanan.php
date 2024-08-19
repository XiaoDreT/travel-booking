<?php
include "config.php";

$nama = $_POST['nama'];
$telp = $_POST['telp'];
$peserta = $_POST['peserta'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$penginapan = isset($_POST['penginapan']) ? 1 : 0;
$transportasi = isset($_POST['transportasi']) ? 1 : 0;
$makanan = isset($_POST['makanan']) ? 1 : 0;
$subtotal = str_replace('.', '', str_replace('Rp. ', '', $_POST['subtotal']));
$total = str_replace('.', '', str_replace('Rp. ', '', $_POST['total']));
$tanggal_pesanan = date('Y-m-d H:i:s');

$sql = "INSERT INTO pesanan (nama, no_hp, tanggal_wisata, tanggal_pesanan, durasi, penginapan, transportasi, makanan, peserta, harga_paket, total)
VALUES ('$nama', '$telp', '$tanggal', '$tanggal_pesanan', '$waktu', '$penginapan', '$transportasi', '$makanan', '$peserta', '$subtotal', '$total')";


if ($conn->query($sql) === TRUE) {
    echo "<h2>Reservasi berhasil disimpan!</h2>";
    header("Location: daftar_pesanan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
