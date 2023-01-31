<?php
session_start();
include "operasi.php";

if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['username'];
}

if (isset($_GET["id_user"])) {
  hapusUser();
}
if (isset($_POST["submit"])) {
  addUser();
}



?>
<?php
include('layout/navbar.php') ?>


<!-- page content -->
<div class="right_col" role="main">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>List User</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>

          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <button type="button" class="btn btn-primary w-25 h-50 mt-4 mx-4" data-toggle="modal" data-target="#exampleModal">
          Tambah User
        </button>

        <div class="card-body">
          <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>foto</th>

                <th>Nama</th>

                <th>Email</th>
                <th>Role</th>
                <th>status</th>
                <th>Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $nomor = 1;
              $query_mysql = mysqli_query($host, "SELECT * FROM user ORDER BY is_Admin DESC");
              while ($data = mysqli_fetch_array($query_mysql)) {
              ?>
                <tr>

                  <td><?= $nomor++; ?></td>
                  <td><img src="uploads/<?= $data['foto']; ?> " style="width:50px; height:50px;object-fit:cover;" /></td>

                  <td><?= $data['nama_user']; ?></td>

                  <td><?= $data['email']; ?></td>
                  <?php if ($data['is_Admin'] == 0) { ?>
                    <td>
                      Member
                    </td>
                    <td>
                      <?php if ($data['status']) { ?>
                        <button class="btn btn-info"> Aktif</button>
                      <?php } else { ?>
                        <button class="btn btn-danger"> Tidak Aktif</button>
                      <?php } ?>
                    </td>
                    <td>
                      <a class="edit btn btn-warning" href="editProfile.php?id_user=<?= $data['id_user']; ?>">Edit</a>
                      <a class="hapus btn btn-danger" href="?id_user=<?= $data['id_user'];  ?>" onclick="return confirm('Yakin?');">Hapus</a>
                    </td>
                  <?php } else { ?>
                    <td>
                      Admin
                    </td>
                    <td>
                      <button class="btn btn-info"> Aktif</button>
                    </td>
                    <td>

                    </td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="instansi">Nama User</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                    <label for="kepada">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                  </div>

                  <div class="form-group">
                    <label for="kepada">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                  <div class="form-group ">
                    <label for="nama">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                  </div>
                  <div class="form-group ">
                    <label for="nama">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih role</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="role">
                      <option value="0">Member</option>
                      <option value="1">Admin</option>
                    </select>
                  </div>


                  <button type="submit" name="submit" class="btn btn-primary col-12">Send</button>
                </form>
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