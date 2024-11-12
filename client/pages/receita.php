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
        
        <div class="main__receita">
            <div class="main__receita__detalhes">
            <h1><?= $info["nome"];  ?></h1>
            <p>Tempo de preparo: <?= $info['tempo'] ?></p>
            <p><?= $info["descricao"] ?> </p>
            <h3>Ingredientes</h3>
            <p>
                <?= $info["ingredientes"] ?>
            </p>
            <h3>Modo de preparo:</h3>
            <p>
                <?= $info["preparo"]?>
            </p>
        </div>
        <div class="main__receita__sobre">
            <img src="https://static.stealthelook.com.br/wp-content/uploads/2022/08/receitas-com-cafe-nada-obvias-para-preparar-de-manha-smoothie-de-cafe-20220819175726.jpg">
            <div class="main__receita__sobre__mark">
                <img id="bookmark" src="../images/bookmark.svg" class="main__shart__footer__mark__book">
                <img id="share" src="../images/share.svg" alt="compartilhar">
            </div>
            <div class="main__receita__sobre__chat">
                <h3><strong>Comentários</strong></h3>
                <div class="main__receita__sobre__chat__comment">
                    <h4>João Vitor Raenke dos Santos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>

                    <h3>Sem comentários</h3>
                </div>
            </div>
        </div>
        </div>
    
</body>
</html>