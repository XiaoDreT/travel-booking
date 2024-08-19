<?php
include("config.php");

$sql = "SELECT * FROM pesanan ORDER BY tanggal_wisata DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />  
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />  
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        .container-box {
            width: 90%;
            margin-top: 50px;
            margin-bottom: 7em;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>
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
                    <li class="nav-item active">
                    <a class="nav-link" href="daftar_pesanan.php">Daftar Pesanan</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="booking.php">Booking <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
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

    <div class="container-fluid">
        <h2 class="text-center">Daftar Pesanan</h2>
        <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == 'sukses') {
                    echo "<div class='container alert alert-success alert-dismissible fade show text-center' role='alert'>
                            Data berhasil dihapus.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                } elseif ($_GET['pesan'] == 'gagal') {
                    echo "<div class='container alert alert-danger alert-dismissible fade show text-center' role='alert'>
                            Gagal menghapus data.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
            }
        ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Jumlah Peserta</th>
                        <th>Tanggal</th>
                        <th>Durasi</th>
                        <th>Penginapan</th>
                        <th>Transportasi</th>
                        <th>Makanan</th>
                        <th>Harga Paket</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= htmlspecialchars($row['telp']); ?></td>
                        <td><?= htmlspecialchars($row['peserta']); ?> orang</td>
                        <td><?= htmlspecialchars($row['tanggal']); ?></td>
                        <td><?= htmlspecialchars($row['waktu']); ?> hari</td>
                        <td><?= ($row['penginapan'] ? 'Ya' : 'Tidak'); ?></td>
                        <td><?= ($row['transportasi'] ? 'Ya' : 'Tidak'); ?></td>
                        <td><?= ($row['makanan'] ? 'Ya' : 'Tidak'); ?></td>
                        <td>Rp. <?= number_format($row['harga_paket'], 0, ',', '.'); ?></td>
                        <td>Rp. <?= number_format($row['total'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id_pesanan']?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="#" onclick="confirmDeletion('<?= $row['id_pesanan']; ?>'); return false;" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='10' class='text-center'>Tidak ada data pesanan</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmDeletion(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location.href = 'hapus.php?id=' + id;
            }
        }
    </script>

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

<?php
$conn->close();
?>