<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/x-icon" sizes="512x512" href="<?= ROOT ?>/View/Assets/Images/Favicon.png">

        <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/View/Assets/CSS/Listagem.css">

        <script defer type="text/javascript" src="<?= ROOT ?>/View/Assets/JS/Global.js">  </script>

        <title> Listagem de Cargos de Usuário </title>

    </head>

    <body>

        <button id="theme-button"> Alterar Tema </button>

        <h1> Listagem de Cargos de Usuário </h1>

        <div>

            <table>
                
                <thead>

                    <tr>

                        <th> Nome </th>

                        <th> Editar </th>
                    
                    </tr>

                </thead>

                <tbody>

                    <?php if(count($model) > 0): ?>

                        <?php foreach($model as $cargo): ?>

                            <tr>

                                <td> <?= $cargo->GET_Nome() ?> </td>

                                <td> <a href="<?= ROOT ?>/cargo?id=<?= $cargo->GET_ID() ?>"> <i class="bx bx-edit">  </i> </a> </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="2"> NULL </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

        <a href="<?= ROOT ?>/cargo"> Voltar </a>
        
    </body>

</html>