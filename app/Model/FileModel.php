<?php


    namespace Model;

    use core\DB;


    class FileModel
    {

        public $db;
        public $users;
        public $upload;
        public $information = [];
        public $id;

        public function selectUsers()
        {
            $this->db = new DB;
            return $this->db->select("SELECT `id`,`name`,`birth` FROM `users`", []);
        }

        public function selectUpload()
        {
            $this->db = new DB;
            return $this->db->select("SELECT `file` FROM `uploads` WHERE `user_id` = ?", [$this->id]);
        }

        public function ssortUsers()
        {
            $this->db = new DB;
            return $this->db->select("SELECT * FROM `users` ORDER BY `users`.`birth` ASC", []);
        }

        public function msortUsers()
        {
            $this->db = new DB;
            return $this->db->select("SELECT * FROM `users` ORDER BY `users`.`birth` DESC", []);
        }
    }