<?php
    include('../conexao/conexao.php');
    session_start();
    $mysql = new BancodeDados();
    $mysql->conecta();

    require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();

        $pnome = $_POST['nome'];
        $pdata = $_POST['data'];
        $pemail = $_POST['email'];
        $psenha = $_POST['senha'];
        $pnivel = $_POST['nivel'];

        $data_formatada = date('d/m/Y', strtotime($pdata));

        $idade = date_diff(date_create($pdata), date_create('today'))->y;

        if ($idade < 18) {
            echo "<script language='javascript' type='text/javascript'>alert('Você deve ter pelo menos 18 anos para se cadastrar.');window.location.href='javascript:history.back()';</script>";
        } else {

            $sqlstring = "INSERT INTO usuario(nome, data, email, senha, nivel) VALUES ('$pnome', '$data_formatada', '$pemail', '$psenha', '$pnivel')";
            $query = @mysqli_query($mysql->con, $sqlstring);

            if ($query) {
                session_start();
                echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='../adm_usuarios.php';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Não foi possível se cadastrar');</script>";
            }
        }

        $mysql->fechar();

    $mysql->fechar();
?>
