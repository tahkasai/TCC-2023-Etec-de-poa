<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de senha</title>
</head>
<body>
    <?php
        require_once('../conexao/conexao.php');
        session_start();
        $mysql = new BancodeDados();
        $mysql->conecta();
        
        $pemail = $_POST['email'];
        $psenha = $_POST['senha'];

        $sqlstring = "SELECT * FROM usuario WHERE email='$pemail' AND senha='$psenha'";
        echo $sqlstring;  
        $result = @mysqli_query($mysql->con, $sqlstring);

        if ($result) {
            $total = mysqli_num_rows($result);

            if ($total == 1) {
                $usuario = mysqli_fetch_assoc($result);

                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['data'] = $usuario['data'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['senha'] = $usuario['senha'];

                if ($usuario['nivel'] == 'usuario' ) {
                    echo "<script language='javascript' type='text/javascript'>alert('Você está logado!');window.location.href='../user_inicio.php';</script>";
                } else if ($usuario['nivel'] == 'adm' || $usuario['nivel'] == 'administrador') {
                    echo "<script language='javascript' type='text/javascript'>alert('Você está logado!');window.location.href='../adm_inicio.php';</script>";       
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Nível desconhecido');window.location.href='../logincadastro.html';</script>";
                }
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Senha ou login inválido');window.location.href='javascript:history.back()';</script>";
            }
        } else {
            echo "Error in query: " . mysqli_error($mysql->con); 
        }

        $mysql->fechar();
    ?>
</body>
</html>
