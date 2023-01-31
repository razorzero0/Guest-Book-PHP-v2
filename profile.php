<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}




?>
<?php
include('layout/navbar.php') ?>

<style>
  .right_col {
    display: flex;
    justify-content: center;
  }

  .card {

    display: flex;
    margin-left: 30%;
    flex-direction: column;
    align-items: center;
  }
</style>
<!-- page content -->
<div class="right_col" role="main">

  <div class="col-md-4 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Profile Saya</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <?php
      $id = $_SESSION['id'];

      $query_mysql = mysqli_query($host, "SELECT * FROM user WHERE id_user='$id'");
      while ($data = mysqli_fetch_array($query_mysql)) {
      ?>


        <div class="container mt-5">
          <div class="col-lg-6 offset-md-4">
            <div class="card" style="width: 18rem;">
              <div style="width:60px;border-radius: 100px;">
                <img class="card-img-top rounded mt-1 img-circle" src="uploads/<?= $data['foto'] ?>" alt="Card image cap" class="img-circle profile_img" style="width: 100%;height:60px;  object-fit:cover;">
              </div>
              <div class="card-body ">
                <h5 class="card-title text-center"><?= $data['nama_user'] ?></h5>
                <p class="card-text text-center"><?= $data['username'] ?></p>
                <p class="card-text text-center"><?= $data['email'] ?></p>

                <div class="text-center">
                  <a href="editProfile.php?id_user=<?= $data['id_user'] ?>" class="btn btn-primary mt-3 ">Edit Profile</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

  </div>
</div>


<!-- /page content -->


<?php include('layout/footer.php') ?>