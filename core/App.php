<?php


    namespace Core;

    use Exception;

    class App
    {
        public function run()
        {
            try {

                $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

                rtrim($path, '/');

                $path = explode('/', $path);
                $controller = !empty($path[2]) ? strtolower($path[2]) . 'Controller' : 'indexController';
                $action = !empty($path[3]) ? strtolower($path[3]) : 'index';
                $controllerPath = 'Controller\\' . ucfirst($controller);


                if (!class_exists($controllerPath)) {
                    throw new Exception ('class ' . $controllerPath . ' not exist');
                }

                session_start();

                $obj = new $controllerPath;

                if (!method_exists($obj, $action)) {
                    throw new Exception('method ' . $action . ' not found in ' . $controller);
                }

                $obj->$action();

                $tpl = '../app/View/' . $controller . "/" . $action . ".phtml";
                $view = new View();
                $obj->view = $view;
                $obj->view->render($tpl, $obj);

            } catch (Exception $e) {
                header('HTTP/1.0 404 Not Found');
                trigger_error($e->getMessage());
            }
        }
    }