<?php
session_start();
include 'operasi.php';
if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}

if (isset($_POST["submit"])) {
  editPengunjung();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Form Edit</title>
</head>

<body>
  <?php include 'navbar.php' ?>
  <?php
  $id_pengunjung = $_GET['id_pengunjung'];
  $query_mysql = mysqli_query($host, "SELECT * FROM pengunjung WHERE id_pengunjung='$id_pengunjung'");
  while ($data = mysqli_fetch_array($query_mysql)) {
  ?>


    <div class="container mt-3">
      <div class="col-md-6 offset-md-3">
        <div class="card ">
          <div class="card-header">
            Form Buku pengunjung
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="instansi">Nama </label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>">
              </div>
              <div class="form-group">
                <label for="kepada">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>">
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="nama">Waktu Masuk</label>
                  <input type="datetime-local" class="form-control" id="masuk" name="masuk" value="<?php echo substr($data['jam_masuk'], 0, 16) ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="tlp">Waktu Keluar</label>
                  <input type="datetime-local" class="form-control" id="keluar" name="keluar" value="<?php echo substr($data['jam_keluar'], 0, 16) ?>">
                </div>

              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" name="id_pengunjung" value="<?php echo $data['id_pengunjung'] ?>">
              </div>
              <button type="submit" name="submit" class="btn btn-primary col-12">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>