<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" href="img/lampinha.svg" />
        <title>Buddy Lamp</title>
    </head>
    <body>
        <!--Mensagens de erro-->
        <?php
            // Verifica por erros na url
    	    if (isset($_GET['error'])) {
                echo($_GET['error']);
            }

            // Pega cada elemento, se existente, e remove suas aspas
            $nomeDefault = "";
            if (isset($_GET['nome'])) {
                $nomeDefault = trim($_GET['nome'], '\'');
            }

            $emailDefault = "";
            if (isset($_GET['email'])) {
                $emailDefault = trim($_GET['email'], '\'');
            }
        ?>
        <form action="session/registro.php" method="POST">
            <input type="text" name="nome" placeholder="Nome" value="<?php echo $nomeDefault ?>">
            <input type="text" name="email" placeholder="Email" value="<?php echo $emailDefault ?>">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="senha-repeat" placeholder="Repita sua senha">
            <button type="submit" name="botao-submit">Cadastrar-se</button>
        </form>
    </body>
</html>
