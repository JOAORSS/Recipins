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

    <section class="main__resgistrar">
        <h2 class="main__resgistrar__h2">Crie sua conta</h2>
        <form action="../php/registro_resposta.php" method="post">
            <label class="main__resgistrar__label">Nome</label>
            <input class="main__resgistrar__input" type="text" name="conteiner-nome" id="idNome" required>
            <label class="main__resgistrar__label">Email</label>
            <input class="main__resgistrar__input" type="email" name="conteiner-email" id="idEmail" required>
            <label class="main__resgistrar__label">Senha</label>
            <input class="main__resgistrar__input" type="password" name="conteiner-senha" id="idSenha" minlength="8" required>
            <input class="main__resgistrar__submit" type="submit" id="submitForm" value="cadrastar">
        </form>
    </section>
        <div class="main__possui">
            <a class="main__possui__a" href="login.php">Ja possuo uma conta</a>
        </div>

    </main>

</body>