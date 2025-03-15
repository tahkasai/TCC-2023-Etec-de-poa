<?php

    include('../conexao/conexao.php');
    session_start();
    $mysql = new BancodeDados();
    $mysql->conecta();

    $id_user = $_SESSION['id'];

    $sql_palestras = "SELECT * FROM agenda WHERE id_user='$id_user' AND finalizado!='sim'";
    $result_palestras = mysqli_query($mysql->con, $sql_palestras);

    if ($result_palestras && mysqli_num_rows($result_palestras) > 0) {

        echo "<script language='javascript' type='text/javascript'>alert('Você possui palestras agendadas, portanto, não pode excluir a conta');window.location.href='../user_perfil.php';</script>";
    } else {
        
        $sql_code = "DELETE FROM usuario WHERE id_usuario='$id_user'";
        $result = mysqli_query($mysql->con, $sql_code);

        if ($result) {
            echo "<script language='javascript' type='text/javascript'>alert('Sua conta foi excluída com sucesso!');window.location.href='../index.html';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Não foi possível deletar o usuário');window.location.href='../user_perfil.php';</script>";
        }
    }
?>
