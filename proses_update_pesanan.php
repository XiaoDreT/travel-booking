<?php
include "config.php";

$id_pesanan = $_POST['id_pesanan'];
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

$sql = "UPDATE pesanan SET 
        nama='$nama', 
        no_hp='$telp', 
        tanggal_wisata='$tanggal', 
        durasi='$waktu', 
        penginapan='$penginapan', 
        transportasi='$transportasi', 
        makanan='$makanan', 
        peserta='$peserta', 
        harga_paket='$subtotal', 
        total='$total' WHERE id_pesanan='$id_pesanan'";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Pesanan berhasil diupdate!</h2>";
    header("Location: daftar_pesanan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);