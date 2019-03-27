<?php

	// $server		= "localhost"; //sesuaikan dengan nama server
	// $user		= "root"; //sesuaikan username
	// $password	= ""; //sesuaikan password
	// $database	= "db_coba"; //sesuaikan target databese
	
	// $conn = mysqli_connect($server, $user, $password, $database);

	// if (mysqli_connect_errno()) {

	// echo "Gagal terhubung MySQL: " . mysqli_connect_error();

	//  }
	 
	 class Database {
		 //identifikasi database
		 private $host = 'localhost';
		 private $db = 'db_smart';
		 private $username = 'root';
		 private $password = '';
		 private $conn;

		 //function koneksi
		 public function connect(){
			 $this->conn = null;

			 try {
				 $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8', $this->username, $this->password);
				 $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 } catch (PDOException $e) {
				 echo 'Connection Error : ' . $e->getMessage();
			 }
			 return $this->conn;
		 }
	 }

?>