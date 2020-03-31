<?php


    namespace Controller;


    use Model\UserModel;

    class IndexController extends MainController
    {

        public $data;
        protected $login;
        protected $name;
        protected $password;

        public function index()
        {
            echo '<h1>Приветствую</h1>';
        }

    }