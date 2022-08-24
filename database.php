<?php 


class Database{
    public $host = "localhost";
    public $username = "django";
    public $password = "ReksaSyahputra1012!";
    public $db = "pegawai";
    public $conn;


    public function __construct()
    {
        $this->conn = mysqli_connect($this->host,$this->username,$this->password, $this->db); 
    }

}



