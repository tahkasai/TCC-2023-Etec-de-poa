<?php
    if (!empty($_GET['id'])) {
        include('../conexao/conexao.php');
        session_start();
        $mysql = new BancodeDados();
        $mysql->conecta();

        $id = $_GET['id'];

        $sql = "SELECT * FROM usuario WHERE id_usuario=$id";
        $result = mysqli_query($mysql->con, $sql);

        if (!$result) {
            echo "Erro na consulta SQL: " . mysqli_error($mysql->con);
        } else {
            $row_count = mysqli_num_rows($result);

            if ($row_count > 0) {
                 
                $sqlAgenda = "DELETE FROM agenda WHERE id_user=$id";
                $resultAgenda = mysqli_query($mysql->con, $sqlAgenda);

                if (!$resultAgenda) {
                    echo "Erro ao excluir agendamentos: " . mysqli_error($mysql->con);
                }

                $sqldelete = "DELETE FROM usuario WHERE id_usuario=$id";
                $resultdelete = mysqli_query($mysql->con, $sqldelete);

                if ($resultdelete) {
                    header ('Location: ../adm_usuarios.php');
                } else {
                    echo "Erro ao excluir usuário: " . mysqli_error($mysql->con);
                }
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Nenhum usuário encontrado com o ID fornecido');window.location.href='../adm_usuarios.php';</script>";
            }
        }
    }
?>
