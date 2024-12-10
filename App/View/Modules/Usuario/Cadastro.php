<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" sizes="512x512" href="<?= ROOT ?>/View/Assets/Images/Favicon.png">

        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/View/Assets/CSS/Form.css">

        <title> Cadastro de Usuário </title>

    </head>

    <body>

        <h1> Cadastro de Usuário </h1>

        <form action="<?= ROOT ?>/cadastro/salvar" method="post">

            <input type="hidden" name="id" id="id" inputmode="numeric">

            <label for="nome"> Nome: </label>
            <input type="text" name="nome" id="nome" maxlength="255" autocomplete="off" required>

            <label for="email"> E-mail: </label>
            <input type="email" name="email" id="email" maxlength="100" autocomplete="off" required>

            <label for="senha"> Senha: </label>
            <input type="password" name="senha" id="senha" maxlength="255" autocomplete="off" required>

            <label for="confirmacao_senha"> Confirmação de Senha: </label>
            <input type="password" name="confirmacao_senha" id="confirmacao_senha" maxlength="255" autocomplete="off" required>

            <label for="fk_cargo"> Cargo: </label>
            <select name="fk_cargo" id="fk_cargo" required>

                <?php foreach($model as $cargo): ?>

                    <option value="<?= $cargo->GET_ID() ?>"> <?= $cargo->GET_Nome() ?> </option>

                <?php endforeach ?>

            </select>

            <div>

                <a href="<?= ROOT ?>/"> Voltar </a>

                <button type="reset"> Limpar </button>

                <button type="submit"> Cadastrar </button>

            </div>

        </form>
        
    </body>

</html>