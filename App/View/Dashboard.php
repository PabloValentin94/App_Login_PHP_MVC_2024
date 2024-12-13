<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" sizes="512x512" href="<?= ROOT ?>/View/Assets/Images/Favicon.png">

        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/View/Assets/CSS/Global.css">

        <script defer type="text/javascript" src="<?= ROOT ?>/View/Assets/JS/Global.js">  </script>

        <title> Dashboard </title>

    </head>

    <body>

        <button id="theme-button"> Alterar Tema </button>

        <h1> O usuário <span id="user-color"> <?= $_SESSION["usuario"]["nome"] ?> </span> está logado. </h1>

        <a href="<?= ROOT ?>/logout"> Sair </a>

        <?php if($_SESSION["usuario"]["fk_cargo"] === 1): ?>

            <a href="<?= ROOT ?>/cargo"> Cargos </a>

        <?php endif ?>
        
    </body>

    <script type="text/javascript">

        const user_color = document.getElementById("user-color");

        const colors = ["#FF0000", "#008000", "#0000FF"];

        user_color.style.color = colors[<?= $_SESSION["usuario"]["fk_cargo"] - 1 ?>]

    </script>

</html>