<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" sizes="512x512" href="<?= ROOT ?>/View/Assets/Images/Favicon.png">

        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/View/Assets/CSS/Global.css">

        <title> Dashboard </title>

    </head>

    <body>

        <h1> O usuário <?= $_SESSION["usuario"]["nome"] ?> está logado. </h1>

        <a href="<?= ROOT ?>/logout"> Sair </a>

        <?php if($_SESSION["usuario"]["fk_cargo"] === 1): ?>

            <a href="<?= ROOT ?>/cargo"> Cargos </a>

        <?php endif ?>
        
    </body>

</html>