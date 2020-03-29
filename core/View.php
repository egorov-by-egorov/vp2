<?php


    namespace Core;


    class View
    {
        public $data;

        public function render($tpl, $data)
        {
            ob_start();
            $this->data = $data;
            include $tpl;

            echo ob_get_clean();
        }
    }