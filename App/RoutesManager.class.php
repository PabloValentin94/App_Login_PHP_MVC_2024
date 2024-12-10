<?php

    namespace App;

    class RoutesManager
    {

        private $routes = [

            "GET" => [],

            "POST" => []

        ];

        public function Define(string $request_type, string $route, array $data) : void
        {

            $this->routes[$request_type][$route] = $data;

        }

        public function Open(string $route) : void
        {

            $request_type = $_SERVER["REQUEST_METHOD"];

            if(isset($this->routes[$request_type][$route]))
            {

                $data = $this->routes[$request_type][$route];

                switch(count($data))
                {

                    case 1:

                        include VIEWS . $data[0];

                    break;

                    default:

                        $class = $data[0];

                        $method = $data[1];

                        if(isset($data[2]))
                        {

                            (new $class())->$method(...$data[2]);
                            
                        }

                        else
                        {

                            (new $class())->$method();

                        }

                    break;

                }

            }

            else
            {

                include VIEWS . "../Erro.php";

            }

        }

    }

?>