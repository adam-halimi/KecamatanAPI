<?php
    //header
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../koneksi.php';
    include_once '../Model/Accident.php';

    //koneksi database
    $database = new Database();
    $db = $database->connect();

    //panggil class 
    $accident = new Accident($db);

    //get id-nya
    $accident->id_acc = isset($_GET['id_acc']) ? $_GET['id_acc'] : die();

    //get accident
    $accident->read_single();

    //data array
    $accident_array = array(
        'id_acc' => $accident->id_acc,
        'gambar' => $accident->gambar,
        'time_kejadian' => $accident->time_kejadian,
        'date_kejadian' => $accident->date_kejadian,
        'deskripsi' => $accident->deskripsi,
        'nama' => $accident->nama,
        'status' => $accident->status
    );

    //ubah data ke json
    print_r(json_encode($accident_array));
    