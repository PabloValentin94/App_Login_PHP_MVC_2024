<?php

    namespace App\Controller;

    abstract class Controller
    {

        public static function Render(string $view, array | object | null $model = null) : void
        {

            $file = VIEWS . $view . ".php";

            if(file_exists($file))
            {

                include $file;
                
            }

            else
            {

                exit("Página não encontrada! Arquivo especificado: $file.");
                
            }

        }

        public static function Redirect(string $header) : void
        {

            header("Location: " . ROOT . $header);

        }

        public static function Alert(string $message, string $header = "/") : void
        {

            $header = ROOT . $header;

            exit("<script> alert('$message'); " .
                 "history.pushState(null, null, '$header'); " .
                 "window.location.reload(true); </script>");

        }

    }

?>