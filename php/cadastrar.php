<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Banco</title>
</head>
<body>
    <?php
        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();

        $pnome = $_POST['nome'];
        $pdata = $_POST['data'];
        $pemail = $_POST['email'];
        $psenha = $_POST['senha'];

        $data_formatada = date('d/m/Y', strtotime($pdata));

        $idade = date_diff(date_create($pdata), date_create('today'))->y;

        if ($idade < 18) {
            echo "<script language='javascript' type='text/javascript'>alert('Você deve ter pelo menos 18 anos para se cadastrar.');window.location.href='../logincadastro.html';</script>";
        } else {

            $sqlstring = "INSERT INTO usuario(nome, data, email, senha, nivel) VALUES ('$pnome', '$data_formatada', '$pemail', '$psenha', 'usuario')";
            $query = @mysqli_query($mysql->con, $sqlstring);

            if ($query) {
                session_start();
                echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso! Faça seu login');window.location.href='../logincadastro.html';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Não foi possível se cadastrar');</script>";
            }
        }

        $mysql->fechar();
    ?>
</body>
</html>
