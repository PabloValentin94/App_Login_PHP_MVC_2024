<?php

    spl_autoload_register(function(string $class) {

        $file = BASEDIR . $class . ".class.php";

        if(file_exists($file))
        {

            require $file;

        }

        else
        {

            exit("Classe não encontrada! Arquivo especificado: $file.");

        }

    });

?>