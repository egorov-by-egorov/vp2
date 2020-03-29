<?php


    namespace Controller;
    use Core\DB, Faker\Factory;


    class FakerController extends MainController
    {
        public $view;
        public $file;

        public function index($tmpl)
        {
            $db = new DB();
            $faker = Factory::create('ru_RU');

            for ($i = 0; $i < 10; $i++) {
                for ($j = 0; $j < 4; $j++) {
                    $this->data[$i][0] = $faker->firstName;
                    $this->data[$i][1] = $faker->password;
                    $this->data[$i][2] = $faker->date();
                    $this->data[$i][3] = $faker->text;
                    $this->data[$i][4] = $faker->url;
                }
            }

            foreach ($this->data as $value) {
                $db->insert("INSERT INTO `users` (`name`, `password`, `birth`, `description`, `image`)
                 VALUES (?, ?, ?, ?, ?);",
                    [$value[0], $value[1], $value[2], $value[3], $value[4]]);
            }

            for ($i = 0; $i < 10; $i++) {
                for ($j = 0; $j < 1; $j++) {
                    $this->file[$i][0] = rand(20, 29);
                    $this->file[$i][1] = "/domains/vp_02020202/www/image/" . $faker->word . "/" . $faker->word . "/" . $faker->word . ".jpg";
                }
            }
            foreach ($this->file as $value) {
                $db->insert("INSERT INTO `uploads` (`user_id`, `file`)
                 VALUES (?, ?);",
                    [$value[0], $value[1]]);
            }

            $this->view->render($tmpl, $this->data);

        }
    }