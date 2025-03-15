<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar senha</title>
</head>

<body>
    <?php

        include('../conexao/conexao.php');
        session_start();
        $mysql = new BancodeDados();
        $mysql->conecta();
        $email=$_SESSION['email'];
        $senhanova=$_POST['senhanova'];
        echo $email;
        echo $senhanova;

            if (!$mysql->con) {
                echo("Conexão falhou: ".mysqli_error($mysql->con));
            }else{
                echo"Conexão bem sucedida";
            }

            if (isset($_POST['senhanova'])) {

                $email = $_SESSION['email'];

                $sqlstringrec = "UPDATE usuario SET senha = '$senhanova' WHERE email='$email'";
                $queryrec = @mysqli_query($mysql->con, $sqlstringrec);

                if($queryrec){
                    echo"<script language='javascript' type='text/javascript'>alert('Alteração efetuada com sucesso!');window.location.href='../index.html';</script>";
                }else{    
                    echo "Erro na alteração da senha" . mysqli_error($mysql->con);
                }       
        }

        $mysql->fechar();

    ?>

</body>
</html>