<?php 
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    var_dump($id);

    $sql = "DELETE FROM pesanan WHERE id_pesanan='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: daftar_pesanan.php?id=&$id&pesan=hapus_sukses");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}