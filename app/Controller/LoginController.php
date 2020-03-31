<?php


    namespace Controller;

    use Model\UserModel;

    class LoginController extends MainController
    {
        /**
         * @var UserModel $data
         */
        public $data;
        protected $login;
        protected $name;
        protected $password;

        public function index()
        {
            echo '<h1>Вход в систему</h1>';
        }
        public function login()
        {
            $this->data = new UserModel();
            $this->data->loginName = htmlspecialchars(trim($_POST['loginName']));
            $this->data->loginPassword = htmlspecialchars(trim($_POST['loginPassword']));
            $this->data->name = $this->data->selectUser();
            if (isset($_POST['loginSubmit'])) {
                if ($this->data->loginPassword == "") {
                    $this->data->errors = "Введите пароль";
                } elseif ($this->data->loginName == "") {
                    $this->data->errors = "Введите логин";
                } elseif (empty($this->data->name)) {
                    $this->data->errors = "Пользователь с именем " . $this->data->loginName . " не найден";
                }
                if (empty($this->data->errors)) {
                    $this->password = $this->data->selectPasswordForRegistration();
                    if (sha1($this->data->loginPassword) == $this->password[0]["password"]) {
                        $this->data->successful = "Успешно зашел";
                        session_start();
                        $_SESSION['logged_user'] = $this->data->name[0]['name'];
                        header("Location: ../user/user");
                    } else {
                        $this->data->errors = "Пароли не совпадают";
                    }
                }
            }
        }
    }