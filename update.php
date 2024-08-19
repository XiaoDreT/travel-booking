<?php

include "config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM pesanan WHERE id_pesanan='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Update Pesanan Wisata</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <header class="header_section">
        <div class="header_bottom">
            <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                <img src="Images/logo travel.jpeg" alt="" width="80px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link" href="#">Galery</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="booking.php">Booking <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" style="color: blue;">Sign In</a>
                </li>
                <li class="nav-item">
                <a class="nav-link btn btn-primary" href="#" style="color: white;">Sign Up</a>
                </li>
            </ul>
            </div>
        </nav>
        </div>
    </div>
</header>
<div class="card mx-auto">
<div class="card">
    <div class="card-body" style="background-color: #DEC4C4;">
        <h3 class="card-title"><strong>Form Update Pesanan Wisata</strong></h3>
        <form action="./proses_update_pesanan.php" method="POST">
            <input type="hidden" name="id_pesanan" value="<?= $row['id_pesanan'] ?>">
            <div class="form-group">
                <label for="nama">Nama Pemesan:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']?>" required>
            </div>
            <div class="form-group">
                <label for="nohp">Nomor HP/Telp:</label>
                <input type="tel" class="form-control" id="telp" name="telp" value="<?= $row['no_hp']?>" required>
            </div>
            
            <div class="form-group">
                <label for="tanggal">Tanggal Mulai Wisata:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row['tanggal_wisata']?>" required>
            </div>
                
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="number" class="form-control" id="waktu" name="waktu" min="0" value="<?= $row['durasi']?>" required>

            <div class="form-group">
                <label for="jumlah">Jumlah Peserta:</label>
                <input type="number" class="form-control" id="peserta" name="peserta" min="0" value="<?= $row['peserta']?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Pelayanan Paket Wisata</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="penginapan" name="penginapan" value="Penginapan" <?php echo ($row['penginapan'] == 1) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="penginapan"><strong>Penginapan</strong> (Rp. 1.000.000)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="transportasi" name="transportasi" value="Transportasi" <?php echo ($row['transportasi'] == 1) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="transportasi"><strong>Transportasi</strong> (Rp. 1.200.000)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="makanan" name="makanan" value="Makanan" <?php echo ($row['makanan'] == 1) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="makanan"><strong>Makanan</strong> (Rp. 500.000)</label>
                </div>
            </div>
            <div class="form-group">
                <label for="total">Harga Paket Wisata:</label>
                <input type="text" class="form-control" id="subtotal" name="subtotal" min="0" value="Rp. <?= number_format($row['harga_paket'], 0, ',', '.'); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="total">Total Harga:</label>
                <input type="text" class="form-control" id="total" name="total" min="0" value="Rp. <?= number_format($row['total'], 0, ',', '.'); ?>" readonly>
            </div>
            <button type="button" class="btn btn-primary" id="hitung">Hitung</button>
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='daftar_pesanan.php'">Batal</button>
        </form>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
    const penginapanPrice = 1000000;
    const transportasiPrice = 1200000;
    const makananPrice = 500000;
    function hitungSubtotal() {
        const waktu = parseInt($('#waktu').val()) || 1;
        let subtotal = 0;
        if ($('#penginapan').is(':checked')) {
            subtotal += penginapanPrice * waktu;
        }
        if ($('#transportasi').is(':checked')) {
            subtotal += transportasiPrice * waktu;
        }
        if ($('#makanan').is(':checked')) {
            subtotal += makananPrice * waktu;
        }
        $('#subtotal').val('Rp. ' + subtotal.toLocaleString('id-ID'));
    }
    function hitungTotal() {
        const peserta = parseInt($('#peserta').val()) || 1;
        const hitungSubtotal = parseInt($('#subtotal').val().replace(/\D/g, '')) || 0;
        const total = peserta * hitungSubtotal;
        $('#total').val('Rp. ' + total.toLocaleString('id-ID'));
    }
    $('#hitung').on('click', function() {
        hitungSubtotal();
        hitungTotal();
    });
});
</script>
</body>
</html>

<?php
mysqli_close($conn);
?>