<?php
    include('../conexao/conexao.php');
    session_start();
    $mysql = new BancodeDados();
    $mysql->conecta();

    if (isset($_POST['id'])) {
        $id_usuario = $_POST['id'];

        $pnome = $_POST['nome'];
        $pdata = $_POST['data'];
        $pemail = $_POST['email'];
        $psenha = $_POST['senha'];
        $pnivel = $_POST['nivel'];

        $data_format = date('d/m/Y', strtotime($pdata));

        $sqlstring = "UPDATE usuario SET nome=?, data=?, email=?, senha=?, nivel=? WHERE id_usuario=?";

        $stmt = $mysql->con->prepare($sqlstring);

        if ($stmt) {
            
            $stmt->bind_param("sssssi", $pnome, $data_format, $pemail, $psenha, $pnivel, $id_usuario);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script language='javascript' type='text/javascript'>alert('Alteração efetuada com sucesso!');window.location.href='../adm_usuarios.php';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro, tente novamente');window.location.href='javascript:history.back()';</script>";
            }

            $stmt->close();
        } else {

            echo "<script language='javascript' type='text/javascript'>alert('Erro na preparação da consulta');window.location.href='javascript:history.back()';</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('ID de usuário não encontrado');window.location.href='javascript:history.back()';</script>";
    }

    $mysql->fechar();
?>
