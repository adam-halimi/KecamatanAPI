<?php

  require_once 'koneksi.php';

  header('Content-Type: application/json');

  if($_SERVER['REQUEST_METHOD']=='POST') {

    $time_kejadian    = isset($_POST['time_kejadian'])?$_POST['time_kejadian']:"";
    $date_kejadian    = isset($_POST['date_kejadian'])?$_POST['date_kejadian']:"";
    $deskripsi        = isset($_POST['deskripsi'])?$_POST['deskripsi']:"";
    $nama             = isset($_POST['nama'])?$_POST['nama']:"";
    $status           = isset($_POST['status'])?$_POST['status']:"";
    $id_user          = isset($_POST['id_user'])?$_POST['id_user']:"";

    $query = "INSERT INTO tb_kejadian (gambar, time_kejadian, date_kejadian, deskripsi, nama, status, id_user) 
              VALUES ('http://localhost/smart/image/default.png','$time_kejadian','$date_kejadian','$deskripsi','$nama','$status','$id_user')";
    $exeq = mysqli_query($conn, $query);

    echo ($exeq) ? json_encode(array('kode' => 1, 'pesan' => 'Simpan berhasil!')):
                  json_encode(array('kode' => 2, 'pesan' => 'Simpan gagal!'));
  } else {
      echo json_encode(array('kode' => 101, 'pesan' => 'Request tidak valid'));
  }
?>