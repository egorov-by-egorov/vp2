<?php


    namespace Core;

    use PDO;

    class Connection
    {
        public $db;

        public function connect()
        {
            $host = 'localhost';
            $user = "root";
            $pass = "root";
            $dbname = "vp2";

            $dsn = "mysql:host=$host;dbname=$dbname";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->db = new PDO($dsn, $user, $pass, $opt);
        }
    }