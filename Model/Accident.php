<?php
    class Accident {
        // panggil nama tabel database
        private $conn;
        private $table = 'tb_accident';

        // attribute yang digunakan
        public $id_accident;
        public $gambar;
        public $time_kejadian;
        public $date_kejadian;
        public $deskripsi;
        public $nama;
        public $status;

        // database construct
        public function __construct($db){
            $this->conn = $db;
        }

        // fungsi fungsi
        // fungsi read all data
        public function read_all_accident(){
            // query database
            $query = 'SELECT * FROM ' . $this->table . 'ORDER BY id_accident ASC';

            // statement
            $stmt = $this->conn->prepare($query);

            // execute statement
            $stmt->execute();
            return $stmt;
        }

        // fungsi read single data
        public function read_single_accident(){
            // query database
            $query = 'SELECT * FROM ' . $this->table . '
            WHERE id_accident = ?
            LIMIT 0,1';

            // statement
            $stmt = $this->conn->prepare($query);

            // bind id
            $stmt->bindParam(1, $this->id_mhs);

            // execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set data
            $this->gambar = $row['gambar'];
            $this->time_kejadian = $row['time_kejadian'];
            $this->date_kejadian = $row['date_kejadian'];
            $this->deskripsi = $row['deskripsi'];
            $this->nama = $row['nama'];
            $this->status = $row['status'];
        }

        // fungsi create
        public function create_accident(){
            // create query
            $query = 'INSERT INTO '. 
                $this->table . '
            SET
            gambar = :gambar,
            time_kejadian = :time_kejadian,
            date_kejadian = :date_kejadian,
            deskripsi = :deskripsi,
            nama = :nama,
            status = status';

            // statement
            $stmt = $this->conn->prepare($query);

            // clean the data
            $this->gambar = htmlspecialchars(strip_tags($this->gambar));
            $this->time_kejadian = htmlspecialchars(strip_tags($this->time_kejadian));
            $this->date_kejadian = htmlspecialchars(strip_tags($this->date_kejadian));
            $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
            $this->nama = htmlspecialchars(strip_tags($this->nama));
            $this->status = htmlspecialchars(strip_tags($this->status));

            // binding data
            $stmt->bindParam(':gambar', $this->gambar);
            $stmt->bindParam(':time_kejadian', $this->time_kejadian);
            $stmt->bindParam(':date_kejadian', $this->date_kejadian);
            $stmt->bindParam(':deskripsi', $this->deskripsi);
            $stmt->bindParam(':nama', $this->nama);
            $stmt->bindParam(':status', $this->status);

            // execute query database
            if ($stmt->execute()) {
                return true;
            }

            //print error jika error :v
            printf("Error : %s.\n", $stmt->error);

            return false;
        }

        //delete function
        public function delete_accident(){
            // query database delete
            $query = 'DELETE FROM ' . $this->table . ' WHERE id_accident = :id_accident';

            // statement
            $stmt = $this->conn->prepare($query);

            // clean data just id
            $this->id_accident = htmlspecialchars(strip_tags($this->id_accident));

            // binding hanya id juga
            $stmt->bindParam(':id_accident', $this->id_accident);

            // execute query
            if ($stmt->execute()) {
                return true;
            }

            //print error jika error :v
            printf("Error: %s.\n", $stmt->error);

            return false;
        }
    }
?>