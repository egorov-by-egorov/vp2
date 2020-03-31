<?php


    namespace Controller;

    use Model\UserModel;

    class RegistrationController extends MainController
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
            echo '<h1>Регистрация</h1>';
        }
        public function registration()
        {
            $this->data = new UserModel();
            $name = htmlspecialchars(trim($_POST['name']));
            $pass = htmlspecialchars(trim($_POST['password']));
            $password = sha1($pass);
            if (isset($_POST['submit'])) {
                if (strlen($pass) < 6) {
                    $this->data->errors = "Пароль не должен быть меньше 6-ти символов";
                } elseif (strlen($name) < 2) {
                    $this->data->errors = "Имя не должно быть меньше 2-ух символов";
                } elseif (empty($this->data->errors)) {
                    $this->data->name = $name;
                    $this->name = $this->data->selectUserForRegistration();
                    if (!empty($this->name)) {
                        $this->data->errors = "Пользователь с именем " . $this->data->name . " уже существует";
                    } else {
                        $this->data->password = $password;
                        $this->data->saveData();
                        $this->data->successful = "Регистрация прошла успешно <a href='/login'>Войти</a>";
                    }
                }
            }
        }
    }