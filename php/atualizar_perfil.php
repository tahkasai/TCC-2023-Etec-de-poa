<?php

    include('../conexao/conexao.php');
    session_start();
    $mysql = new BancodeDados();
    $mysql->conecta();

    if (isset($_POST['nomee'], $_POST['dataa'], $_POST['emaill'], $_POST['senhaa'])) {
        $pnomee = $_POST['nomee'];
        $pdataa = $_POST['dataa'];
        $pemaill = $_POST['emaill'];
        $psenhaa = $_POST['senhaa'];

        $stmt = $mysql->con->prepare("UPDATE usuario SET nome=?, data=?, email=?, senha=? WHERE id_usuario=?");
        $stmt->bind_param("sssss", $pnomee, $pdataa, $pemaill, $psenhaa, $_SESSION['id']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
        
            $_SESSION['nome'] = $pnomee;
            $_SESSION['data'] = $pdataa;
            $_SESSION['email'] = $pemaill;
            $_SESSION['senha'] = $psenhaa;

            echo "<script language='javascript' type='text/javascript'>alert('Alteração efetuada com sucesso!');window.location.href='javascript:history.back()';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro, tente novamente');window.location.href='javascript:history.back()';</script>";
        }

        $stmt->close();
    }

    $mysql->fechar();
?>
