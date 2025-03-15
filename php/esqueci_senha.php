<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/logo.png">
    <title>Esqueci a Senha</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <div class="pag_login">
        <div class="conteiner_login">
            <form id="emailrecp" action="enviar_email.php" method="POST">
                <br><br><h2>Esquece a senha?</h2><br>
                <p>Informe o email de recuperação de senha</p><br><br>

                <div class="actual-form">
                    <div class="input-wrap">
                        <input name="emailrec" type="text" minlength="4" class="input-field" required/>
                        <label>E-mail</label>
                    </div>
                </div>

                <button name="submit" type="submit" class="sign-btn">Enviar</button><br>
            </form>
        </div>
        <script src="../js/app.js"></script>
    </div>

</body>
</html>