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

    //variabel post
    $result = $accident->read_all_accident();

    //get data
    $num = $result->rowCount();

    //cek data
    if ($num > 0) {
        //post data jadi array
        $accident_array = array();
        $accident_array['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $accident_item = array(
                'id_acc' => $id_acc,
                'gambar' => $gambar,
                'time_kejadian' => $time_kejadian,
                'date_kejadian' => $date_kejadian,
                'deskripsi' => $deskripsi,
                'nama' => $nama,
                'status' => $status
            );

            // masukkan data item ke attribute data
            array_push($accident_array['data'], $accident_item);
        }

        //ubah data ke json
        echo json_encode($accident_array);
    } else {
        // data kosong lol
        echo json_encode(
            array('message' => 'Data Not Found!')
        );
    }

