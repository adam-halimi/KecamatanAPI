<?php

  require_once 'koneksi.php';

  header('Content-Type: application/json');

  if($_SERVER['REQUEST_METHOD']=='POST') {

    $nama_lengkap = isset($_POST['nama_lengkap'])?$_POST['nama_lengkap']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";
    $no_tlpn = isset($_POST['no_tlpn'])?$_POST['no_tlpn']:"";
    $alamat = isset($_POST['alamat'])?$_POST['alamat']:"";
    $username = isset($_POST['username'])?$_POST['username']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
	// $confirm_password = isset($_POST["confirm_password"])?$_POST["confirm_password"]:"";

    $query = "INSERT INTO tb_user (nama_lengkap, email, no_tlpn, alamat, username, password, foto) 
              VALUES ('$nama_lengkap', '$email', '$no_tlpn', '$alamat', '$username', '$password', 'http://192.168.100.13/smart/image/default.png')";
    $exeq = mysqli_query($conn, $query);

    echo ($exeq) ? json_encode(array('kode' => 1, 'pesan' => 'Register berhasil, silahkan login')):
                  json_encode(array('kode' => 2, 'pesan' => 'Register gagal, silahkan cobalagi'));
  } else {
      echo json_encode(array('kode' => 101, 'pesan' => 'Request tidak valid'));
  }
?>