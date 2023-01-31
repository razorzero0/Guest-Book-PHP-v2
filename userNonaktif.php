<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}


if (isset($_POST["aktifkan"])) {
  aktifkan();
}
if (isset($_POST["nonaktifkan"])) {
  nonaktifkan();
}


?>
<?php
include('layout/navbar.php') ?>


<!-- page content -->
<div class="right_col" role="main">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Member Yang Tidak Aktif selama 3 bulan</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="container mt-3">
          <div class="col-md-12 ">
            <div class="card ">

              <div class="col-md-12 mt-5">
                <div class="card ">

                  <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>foto</th>

                          <th>Nama</th>
                          <th>Waktu login (terakhir)</th>

                          <th>Email</th>
                          <th>status</th>


                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $nomor = 1;
                        $date = new DateTime();
                        $date->modify('-3 month');
                        $cek =  $date->format('Y-m-d h:m:s');

                        $query_mysql = mysqli_query($host, "SELECT * FROM user WHERE is_Admin='0' AND waktu_login<'$cek'");
                        while ($data = mysqli_fetch_array($query_mysql)) {
                        ?>
                          <tr>

                            <td><?= $nomor++; ?></td>
                            <td><img src="uploads/<?= $data['foto']; ?> " style="width:50px;" /></td>

                            <td><?= $data['nama_user']; ?></td>

                            <td><?= substr($data['waktu_login'], 0, 19); ?></td>
                            <td><?= $data['email']; ?></td>
                            <td>
                              <?php if ($data['status']) { ?>
                                <form method="post">
                                  <input name="id" value="<?= $data['id_user'] ?>" type="hidden" />
                                  <button class="btn btn-info" name="nonaktifkan" onclick="return confirm('Yakin ingin menonaktifkan akun ini ?')">Aktif</button>
                                </form>
                              <?php } else { ?>
                                <form method="post">
                                  <input name="id" value="<?= $data['id_user'] ?>" type="hidden" />
                                  <button class="btn btn-danger" name="aktifkan">Tidak Aktif</button>
                                </form>

                              <?php } ?>

                            </td>
                          <?php } ?>
                          </tr>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

  </div>
</div>


<!-- /page content -->


<?php include('layout/footer.php') ?>