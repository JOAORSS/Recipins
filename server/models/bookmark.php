<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form id="form" action="../index.php/usuario" method="POST" enctype="multipart/form-data">
        <h2 class="titulo_form">Faça Login!</h2>
        <label for="">nome</label>
        <input class="input-space" required type="text" name="nome">
        <label for="">Email</label>
        <input class="input-space" required type="email" name="email">
        <label for="">Senha</label>
        <input class="input-space" required type="password" name="senha">
        <label for="">imagem</label>
        <input class="input-space" required type="file" name="imagem">
        <input class="input-submit" type="submit">
    </form>
    
</body>
</html>