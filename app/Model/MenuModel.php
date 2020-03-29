<?php


    namespace Model;
    use core\DB;


    class MenuModel
    {
        public $errors;
        public $successful;
        public $db;
        public $image;
        public $login;
        public $avatar;
        public $birth;
        public $date;
        public $description;
        public $dateDescription;
        public $id;
        public $file;

        public function updateImage()
        {
            $this->db = new DB;
            $this->db->update("UPDATE `users` SET `image` = ? WHERE `users`.`name` = ?;", [$this->image, $this->login]);
        }

        public function selectImage()
        {
            $this->db = new DB;
            return $this->db->select("SELECT `image` FROM `users` WHERE `name`=?", [$this->login]);
        }

        public function updateDescription()
        {
            $this->db = new DB;
            $this->db->update("UPDATE `users` SET `birth` = ?, `description` = ? WHERE `users`.`name` = ?;", [$this->birth, $this->description, $this->login]);
        }

        public function selectDescription()
        {
            $this->db = new DB;
            return $this->db->select("SELECT `birth`, `description` FROM `users` WHERE `name`=?", [$this->login]);
        }

        public function uploadImage()
        {
            $this->db = new DB;
            $this->db->insert("INSERT INTO `uploads` (`user_id`, `file`) VALUES (?,?)", [$this->id, $this->file]);
        }

        public function selectId()
        {
            $this->db = new DB;
            return $this->db->select("SELECT id FROM `users` WHERE `name`=?", [$this->login]);
        }

        public function selectLink()
        {
            $this->db = new DB;
            return $this->db->select("SELECT `file` FROM `uploads` WHERE `user_id`=?", [$this->id]);
        }

    }