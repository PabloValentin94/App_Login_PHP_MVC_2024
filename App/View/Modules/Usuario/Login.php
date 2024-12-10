<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" sizes="512x512" href="<?= ROOT ?>/View/Assets/Images/Favicon.png">

        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/View/Assets/CSS/Form.css">

        <title> Login de Usuário </title>

    </head>

    <body>

        <h1> Login de Usuário </h1>

        <form action="<?= ROOT ?>/login/validar" method="post">

            <label for="email"> E-mail: </label>
            <input type="email" name="email" id="email" maxlength="100" autocomplete="off" required>

            <label for="senha"> Senha: </label>
            <input type="password" name="senha" id="senha" maxlength="255" autocomplete="off" required>

            <div>

                <a href="<?= ROOT ?>/"> Voltar </a>

                <button type="reset"> Limpar </button>

                <button type="submit"> Entrar </button>

            </div>

        </form>
        
    </body>

</html>