<?php


    namespace Core;


    class DB
    {
        public $data;

        public function insert($sql, $array)
        {
            $connect = new Connection();
            $connect->connect();
            $stm = $connect->db->prepare($sql);
            $stm->execute($array);
        }

        public function select($sql, $array)
        {
            $connect = new Connection();
            $connect->connect();
            $sth = $connect->db->prepare($sql);
            $sth->execute($array);
            return $sth->fetchAll($connect->db::FETCH_ASSOC);
        }

        public function update($sql, $array)
        {
            $connect = new Connection();
            $connect->connect();
            $stmt = $connect->db->prepare($sql);
            $stmt->execute($array);
        }

        public function create($sql, $array)
        {
            $connect = new Connection();
            $connect->connect();
            $sth = $connect->db->prepare($sql);
            $sth->execute($array);
        }
    }