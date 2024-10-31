<?php
    class Model
    {
        protected $host, $user, $pass, $db, $con;

        public function __construct() 
        {
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->db = "db_kiemtra2";
            
            $this->con = new mysqli($this->host, $this->user, $this->pass, $this->db);
            
            if ($this->con->connect_error) 
            {
                die("Lỗi kết nối: " . $this->con->connect_error);
            }         
        }
    }
?>