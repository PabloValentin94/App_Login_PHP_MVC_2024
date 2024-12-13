<?php

    use App\RoutesManager;

    use App\Controller\
    {

        UsuarioController,
        CargoController

    };

    $routes_manager = new RoutesManager();

    $routes_manager->Define("GET", "", [(count($_SESSION) > 0) ? "../Dashboard.php" : "../Inicio.php"]);

    $routes_manager->Define("GET", "/", [(count($_SESSION) > 0) ? "../Dashboard.php" : "../Inicio.php"]);

    if(count($_SESSION) > 0)
    {

        $routes_manager->Define("GET", "/login/verificar", [UsuarioController::class, "Verify"]);

        $routes_manager->Define("GET", "/logout", [UsuarioController::class, "Logout"]);

        if($_SESSION["usuario"]["fk_cargo"] === 1)
        {

            $routes_manager->Define("GET", "/cargo", [CargoController::class, "Form"]);

            $routes_manager->Define("POST", "/cargo/salvar", [CargoController::class, "Save"]);

            $routes_manager->Define("GET", "/cargo/listagem", [CargoController::class, "List"]);

        }

    }

    else
    {

        $routes_manager->Define("GET", "/cadastro", [UsuarioController::class, "Form", ["Cadastro"]]);

        $routes_manager->Define("GET", "/login", [UsuarioController::class, "Form"]);

        $routes_manager->Define("POST", "/cadastro/salvar", [UsuarioController::class, "Save"]);

        $routes_manager->Define("POST", "/login/validar", [UsuarioController::class, "Login"]);

    }

    // Abrindo a rota especificada.

    $route = substr(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), strlen(ROOT));

    $routes_manager->Open($route);

?>