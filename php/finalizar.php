<?php
include('../conexao/conexao.php');
session_start();
$mysql = new BancodeDados();
$mysql->conecta();

$id_agenda = isset($_POST['id_agenda']) ? intval($_POST['id_agenda']) : 0;

if ($id_agenda > 0) {
    $sql = "SELECT * FROM agenda WHERE id_agenda = $id_agenda"; 
    $result = mysqli_query($mysql->con, $sql);

    if ($result) {
        $row_count = mysqli_num_rows($result);

        if ($row_count > 0) {
            $sqlAgenda = "UPDATE agenda SET finalizado='sim' WHERE id_agenda = $id_agenda"; 

            $resultAgenda = mysqli_query($mysql->con, $sqlAgenda);

            if ($resultAgenda) {
                echo "<script language='javascript' type='text/javascript'>alert('Palestra finalizada!');window.location.href='../adm_agenda.php';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao finalizar a palestra.');window.location.href='../adm_agenda.php';</script>";
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Nenhum agendamento encontrado com o ID fornecido');window.location.href='../adm_agenda.php';</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro na consulta ao banco de dados');window.location.href='../adm_agenda.php';</script>";
    }
} else {
    echo "<script language='javascript' type='text/javascript'>alert('ID de agenda inválido');window.location.href='../adm_agenda.php';</script>";
}
?>
