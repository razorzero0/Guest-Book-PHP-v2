<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}

if (isset($_POST["submit"])) {
  addPengunjung();
}



?>
<?php
include('layout/navbar.php') ?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Tambah Kunjungan Saya</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="card-body">
          <form action="" method="post">
            <?php
            $id = $_SESSION['id'];
            $query_mysql = mysqli_query($host, "SELECT * FROM user WHERE id_user=$id");
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
              <input type="hidden" value="<?= $data['email'] ?>" name="email"></input>

              <input type="hidden" value="<?= $data['nama_user'] ?>" name="nama"></input>
              <input type="hidden" value="ss" name="komentar"></input>
              <div class="form-group ">
                <label for="masuk">Waktu masuk</label>
                <input type="datetime-local" class="form-control" id="masuk" name="masuk" placeholder="Enter Waktu Masuk">
              </div>
              <div class="form-group">
                <label for="keluar">waktu keluar</label>
                <input type="datetime-local" class="form-control" id="keluar" name="keluar" placeholder="Enter Waktu Keluar">
              </div>
              <button type="submit" name="submit" class="btn btn-primary col-12">Send</button>
          </form>
        <?php } ?>
        </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2> List Kunjungan saya</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">

        <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>

              <th>Waktu Masuk</th>
              <th>Waktu Keluar</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $nomor = 1;
            $email = $_SESSION['email'];
            $query_mysql = mysqli_query($host, "SELECT * FROM pengunjung WHERE email='$email' ORDER BY jam_masuk DESC");
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
              <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $data['jam_masuk'] ?></td>
                <td><?= $data['jam_keluar'] ?></td>


              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>



  </div>
  m
</div>



<!-- /page content -->


<?php include('layout/footer.php') ?>