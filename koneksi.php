<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "Namakuzefanya2";
    private $db = "smkn9";
    protected $koneksi;

    public function __construct()
    {
        $this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->koneksi->connect_error) {
            die("Unable to connect to the database: " . $this->koneksi->connect_error);
        }
    }
}

?>
