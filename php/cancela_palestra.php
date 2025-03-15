<?php
include('../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

if (!empty($_GET['id'])) {
    $id_agenda = $_GET['id'];

    $sql = "UPDATE agenda SET confirmacao='cancelado' WHERE id_agenda=$id_agenda";
    $result = mysqli_query($mysql->con, $sql);

    if ($result) {
        header('Location: ../adm_pendencias.php');
    } else {
        echo 'Erro ao recusar palestra: ' . mysqli_error($mysql->con);
    }
} else {
    echo 'ID não fornecido.';
}
?>
