<?php

require('../operasi.php');
$sql = "SELECT * FROM komentar
       WHERE id < '" . $_GET['last_id'] . "' AND bintang='0' ORDER BY id DESC LIMIT 6";
$result = $host->query($sql);
include('data.php');
