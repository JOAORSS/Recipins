<?php

include_once 'utils/components.php'

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Style.css">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="icon" type="icon type" href="https://www.onlygfx.com/wp-content/uploads/2022/01/red-thumbtack-push-pin-clipart.png">
    <title>Recipins</title>
</head>

<body>

    <header id="header" class="header">
            <a href="index.php" class="header__logo"> <img src="https://www.onlygfx.com/wp-content/uploads/2022/01/red-thumbtack-push-pin-clipart.png" width="50px" height="50px"></a>
            <div class="header__serch">
                <div class="header__serch__text">
                    <img src="assets/serch.svg" class="header__serch__img" width="50px">
                    <input type="text" id="serch">
                </div>
                <img src="assets/line.svg" class="header__serch__line">
            </div>
            <div id="user" class="header__user">
                <a href="pages/receita.php" class="header__user__book">
                    <img src="assets/book.svg" alt="receitas salvas">
                </a>
                <a id="usuario" href="pages/login.php" class="header__user__book">
                    <img id="usuarioImg" src="assets/user.svg" alt="entrar">
                </a>
            </div>
    </header>

    <main id="main" class="main">

        <div id="1" class="separator">

        </div>

        <div id="2" class="separator">
            
        </div>

        <div id="3" class="separator">

        </div>

        <div id="4" class="separator">

        </div>

    </main>
    
    <script type="module" src="./app/app.js"></script>

        
</body>

</html>