<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Travel Booking</title>

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
                    <a class="nav-link" href="daftar_pesanan.php">Daftar Pesanan</a>
                    </li>
                    <li class="nav-item active">
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
    
    <div class="card mx-auto">
    <div class="card">
        <div class="card-body" style="background-color: #DEC4C4;">
            <h3 class="card-title"><strong>Form Booking Paket Wisata</strong></h3>
            <form action="./proses_pemesanan.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Pemesan:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="nohp">Nomor HP/Telp:</label>
                    <input type="tel" class="form-control" id="telp" name="telp" maxlength="12" required>
                </div>
                
                <div class="form-group">
                    <label for="tanggal">Tanggal Mulai Wisata:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                    
                <div class="form-group">
                    <label for="waktu">Waktu:</label>
                    <input type="number" class="form-control" id="waktu" name="waktu" min="0" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Peserta:</label>
                    <input type="number" class="form-control" id="peserta" name="peserta" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pelayanan Paket Wisata</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="penginapan" name="penginapan" value="Penginapan">
                        <label class="form-check-label" for="penginapan"><strong>Penginapan</strong> (Rp. 1.000.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="transportasi" name="transportasi" value="Transportasi">
                        <label class="form-check-label" for="transportasi"><strong>Transportasi</strong> (Rp. 1.200.000)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="makanan" name="makanan" value="Makanan">
                        <label class="form-check-label" for="makanan"><strong>Makanan</strong> (Rp. 500.000)</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="total">Harga Paket Wisata:</label>
                    <input type="text" class="form-control" id="subtotal" name="subtotal" min="0" readonly>
                </div>

                <div class="form-group">
                    <label for="total">Total Harga:</label>
                    <input type="text" class="form-control" id="total" name="total" min="0" readonly>
                </div>

                <button type="button" class="btn btn-primary" id="hitung">Hitung</button>
                <button type="submit" class="btn btn-success">Booking</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">Batal</button>
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

<section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              CONTACT
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  dretham123@gmail.com
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  +6281219034353
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="https://youtu.be/sXAxJEUHH9g?si=YZmarKp4_wQ8z9OF">
              <i class="fa fa-youtube" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              Tempat: Ciampel, Desa Kutamekar, Karawang, Jawa Barat
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="" href="#">
                <img src="images/nav-bullet.png" alt="">
                About
              </a>
              <a class="" href="#">
                <img src="images/nav-bullet.png" alt="">
                Contact
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
          <h4>
            Subscribe
          </h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="#">Andre</a>
      </p>
    </div>
  </section>

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>