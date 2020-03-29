<?php


    namespace Model;
    use core\DB;

    class UserModel
    {
        public $db;
        public $name;
        public $password;
        public $loginName;
        public $loginPassword;
        public $errors = [];
        public $successful;

        public function saveData()
        {
            $this->db = new DB;
            $this->db->insert("INSERT INTO `users` (`name`, `password`) VALUES (?,?)", [$this->name, $this->password]);
        }

        public function selectUser()
        {
            $this->db = new DB;
            return $this->db->select("SELECT * FROM `users` WHERE `name`=?", [$this->loginName]);
        }

        public function selectUserForRegistration()
        {
            $this->db = new DB;
            return $this->db->select("SELECT * FROM `users` WHERE `name`=?", [$this->name]);
        }

        public function selectPasswordForRegistration()
        {
            $this->db = new DB;
            return $this->db->select("SELECT `password` FROM `users` WHERE `name`=?", [$this->loginName]);
        }
    }