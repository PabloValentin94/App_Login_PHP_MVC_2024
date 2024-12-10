<?php

    if(session_start())
    {

        require "Config.php";

        require "Autoload.php";

        require "Routes.php";

    }

    else
    {

        exit("Erro ao iniciar sessão!");

    }

?>