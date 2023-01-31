<?php
include 'operasi.php';
session_start();

if (isset($_POST["submit"])) {
  addPengunjung();
}




?>

<?php include 'navbar.php' ?>

<div class="row col-lg-12 mt-4">
  <div class="container col-md-5">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          Form Pengunjung Perpus
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" aria- placeholder="Enter Nama " required autofocus>
            </div>
            <div class="form-group">
              <label for="email">email</label>
              <input type="text" class="form-control" id="email" name="email" aria- placeholder="Enter Email" required>
            </div>


            <div class="form-group ">
              <label for="masuk">Waktu masuk</label>
              <input type="datetime-local" class="form-control" id="masuk" name="masuk" placeholder="Enter Waktu  requiredMasuk">
            </div>
            <div class="form-group">
              <label for="keluar">waktu keluar</label>
              <input type="datetime-local" class="form-control" id="keluar" name="keluar" placeholder="Enter Waktu  requiredKeluar">
            </div>
            <button type="submit" name="submit" class="btn btn-primary col-12">Send</button>
          </form>
          <small>belum punya akun ? <a href="registrasi.php">daftar disini !</a></small>
        </div>
      </div>
      <script src="assets/sweetalert2/dist/sweetalert2.js"></script>
      <?php if (isset($_GET["status"])) { ?>
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Terima kasih',
            text: 'sudah mengisi form tamu',
          })
        </script>
      <?php } ?>










      </body>

      </html>