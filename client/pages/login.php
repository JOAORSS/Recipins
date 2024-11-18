<?php

include_once ("../utils/components.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/normalize.css">
    <link rel="icon" type="icon type" href="https://www.onlygfx.com/wp-content/uploads/2022/01/red-thumbtack-push-pin-clipart.png">
    <title>Receita</title>
</head>

<body>

    <?=callHeader()?>

    <main class="main">

        <section class="main__resgistrar" style="align-items: center; justify-content: center;" >
            <h2 class="main__resgistrar__h2">Entre com sua conta</h2>
            <form action="../php/login_resposta.php" method="post">
                <label class="main__resgistrar__label">Email</label>
                <input class="main__resgistrar__input" type="email" name="conteiner-email" id="idEmail" title="Coloque seu email aqui *campo obrigatório" required>
                <label class="main__resgistrar__label">Senha</label>
                <input class="main__resgistrar__input" type="password" name="conteiner-senha" id="idSenha" title="Coloque sua senha aqui *campo obrigatório" required>
                <input class="main__resgistrar__submit" type="submit" id="submitForm" value="entrar">
            </form>
        </section>
        <div class="main__possui">
            <a class="main__possui__a" href="registro.php">Não possuo uma conta</a>
        </div>

    </main>

</body>