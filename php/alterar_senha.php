<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/logo.png">
    <title>Alterar senha</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


    <div class="pag_login">
        <div class="conteiner_login">
            <form id="alterar_senha" action="./alteracao.php" method="post">
                <br><h2>Alterar senha</h2>

                <div class="actual-form">
                    <div class="input-wrap">
                    <input name="senhanova" type="passaword" minlength="4" class="input-field" required>
                        <label>Senha nova</label>
                    </div>
                </div>

                <button name="senhanova2" type="submit" class="sign-btn">Enviar</button>
            </form>
        </div>
        <script src="../js/app.js"></script>
    </div> 
    

<?php

    require_once('../conexao/conexao.php');

        session_start();

        $email=$_SESSION['email'];
        ob_start();
        $senhanova=$_SESSION['senhanova'];
        ob_end_clean();
        ob_start();
        echo $email;
        ob_end_clean();

?>

</body>
</html>