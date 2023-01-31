<?php

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($result)) {
  $host = mysqli_connect("localhost", "root", "", "gb");
  $sql = "SELECT * FROM komentar
    ORDER BY bintang DESC,id DESC LIMIT 6";
  $result = $host->query($sql);
}
while ($data = $result->fetch_assoc()) { ?>
  <?php if ($data["username"] !== $_SESSION["username"]) { ?>
    <div class="container post-id" style="display:flex;justify-content:flex-start;" id="<?php echo $data['id']; ?>">
      <div class="komentar  my-3  bg-light" style="min-width: 25rem;">
        <div class="d-flex  align-items-center card-header " style="display: flex;  justify-content:space-between; align-items:center;">
          <div style="overflow:hidden;width:42px;height:42px; border-radius:50%; border:2px solid blue;display:flex;justify-content:center;">
            <img src="uploads/<?= $data['profile'] ?>" class=" img-circle" style="width:100%;object-fit:cover;">

          </div>
          <?php if ($data['bintang']) { ?> <i class="fa fa-star " style="font-size:1.8em; color:#F7D801;margin-left:-4.5em;"></i> <?php } ?>
          <a href="formKomentar.php?id_komentar=<?= $data['id'] ?>" class="text-secondary text-bold" style="cursor:pointer;" onclick="return confirm('yakin ingin menghapus pesanmu  ?')">
            <i class="fa fa-trash" style="font-size:1.5em;"></i>
          </a>

        </div>
        <h5 class="card-title ml-2 "><?= $data['username']; ?></h5>

        <p class="card-text"><?= $data['komentar']; ?></p>
        <small class="float-right font-italic" style="margin-left:8em;"><?= $data['waktu']; ?></small><br>

      </div>
    </div>

  <?php } else { ?>
    <div class="post-id " style="display:flex;justify-content:flex-end;" id="<?php echo $data['id']; ?>">
      <div class="komentar saya my-2  bg-light  " style="min-width: 25rem;">
        <div class=" align-items-center card-header " style="display: flex;  justify-content:space-between; align-items:baseline;">
          <div style="overflow:hidden;width:42px;height:42px; border-radius:50%; border:2px solid green;">
            <img src="uploads/<?= $data['profile'] ?> " class=" img-circle" style="width:100%;object-fit:cover;">

          </div>
          <?php if ($data['bintang']) { ?> <i class="fa fa-star " style="font-size:1.8em; color:#F7D801;margin-left:-4.5em;"></i> <?php } ?>
          <a href="formKomentar.php?id_komentar=<?= $data['id'] ?>" class="text-secondary text-bold" style="cursor:pointer;" onclick="return confirm('yakin ingin menghapus pesanmu  ?')">
            <i class="fa fa-trash" style="font-size:1.5em;"></i>
          </a>

        </div>
        <h5 class="text-primary">saya</h5>
        <div class="card-body bg-light">

          <p class="card-text"><?= $data['komentar']; ?></p>

          <small class="float-right font-italic" style="margin-left:8em;"><i><?= $data['waktu']; ?></i></small><br>
        </div>
      </div>
    </div>

<?php }
} ?>