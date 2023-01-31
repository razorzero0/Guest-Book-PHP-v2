<?php
session_start();
include 'operasi.php';
//  if(isset($_SESSION['username'])) {
//  header('location:adminpage.php'); }

if (isset($_POST["submit"])) {
  login();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
  <title>Form Login</title>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container mt-5">
    <div class="col-md-6 offset-md-3">
      <div class="card ">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group ">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="d-flex justify-content-between">
              <small>belum punya akun ? <a href="registrasi.php">daftar disini !</a></small>
              <button type="submit" name="submit" class="btn btn-success">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
<script src="assets/sweetalert2/dist/sweetalert2.js"></script>
<?php if (isset($_GET["status"])) {
  if ($_GET['status'] == 1)
?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Username / Password Salah',

    })
  </script>
  <?php if ($_GET["status"] == 2) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Akun Anda Dinon-Aktifkan',

      })
    </script>
<?php }
} ?>