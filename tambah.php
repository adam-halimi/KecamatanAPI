<?php  
	include "koneksi.php";

	class add{}

	$gambar 			= $_POST['gambar'];
	$time_kejadian 		= $_POST['time_kejadian'];
	$date_kejadian		= $_POST['date_kejadian'];
	$deskripsi 			= $_POST['deskripsi'];
	$nama 				= $_POST['nama'];
	$status 			= $_POST['status'];
	$id_user 			= $_POST['id_user'];

	if (empty($deskripsi)) {
		$response = new add();
		$response->success = 0;
		$response->message = "Still Empty!";
		die (json_encode($response));
	} else if (empty($nama)) {
		$response = new add();
		$response->success = 0;
		$response->message = "Still Empty!";
		die (json_encode($response));
	} else if (empty($gambar)) {
		$response = new add();
		$response->success = 0;
		$response->message = "Still Empty!";
		die (json_encode($response));
	} else {
		// penamaan gambar
		$random = random_word(20);
		$path = "image/".$random.".png";

		// alamat ip full
		$actualpath = "http://localhost/smart/image/default.png";

		// query database
		$query = mysqli_query($conn, "INSERT INTO tb_kejadian(gambar, time_kejadian, date_kejadian, deskripsi, nama, status, id_user) VALUES ('$actualpath','$time_kejadian','$date_kejadian','$deskripsi','$nama','$status','$id_user')");

		if ($query) {
			file_put_contents($path, base64_decode($image));

			$response = new add();
			$response->success = 1;
			$response->message = "Success!";
			die (json_encode($response));
		} else {
			$response = new add();
			$response->success = 0;
			$response->message = "Error Upload!";
			die (json_encode($response));
		}
	}

	function random_word($id = 20){
		$pool = '1234567890qwertyuiopasdfghjklzxcvbnm';

		$word = '';
		for ($i=0; $i < $id; $i++) { 
			$word .= substr($pool, mt_rand(0,strlen($pool) -1), 1);
		}
		return $word;
	}
	mysqli_close($conn);

?>