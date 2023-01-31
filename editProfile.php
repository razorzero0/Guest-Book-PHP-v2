<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}

if (isset($_POST["submit"])) {
  if ($_SESSION['admin']) {

    editUser();
  } else {
    editProfile();
  }
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
        <h2> Edit Profile </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <?php
        $id_petugas = $_GET['id_user'];
        $query_mysql = mysqli_query($host, "SELECT * FROM user WHERE id_user='$id_petugas'");
        while ($data = mysqli_fetch_array($query_mysql)) {
        ?>



          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="foto_lama" value="<?= $data["foto"]; ?>">
              <div class="form-group">
                <label for="instansi">Nama Admin</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama_user'] ?>">
              </div>
              <div class="form-group">
                <label for="kepada">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>">
              </div>
              <div class="form-group">
                <label for="kepada">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>">
              </div>
              <div class="form-group " style="flex-direction: row;">
                <img src="uploads/<?= $data['foto'] ?> " style="width: 50px; height:50px;margin:5px;object-fit:cover;" />
                <label for="kepada">foto</label>
                <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $data['foto'] ?>">
              </div>


              <div class="form-group">
                <input type="hidden" class="form-control" name="id_user" value="<?php echo $data['id_user'] ?>">
                <input type="hidden" class="form-control" name="role" value="<?php echo $data['is_Admin'] ?>">
              </div>
              <button name="submit" type="submit" class="btn btn-success col-12">Send</button>
            </form>
          </div>

        <?php } ?>
      </div>
    </div>

  </div>
</div>


<!-- /page content -->


<?php include('layout/footer.php') ?>