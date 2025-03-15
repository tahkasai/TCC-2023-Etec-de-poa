<?php

    include('../conexao/conexao.php');
    session_start();

    $mysql = new BancodeDados();
    $mysql->conecta();

    $_SESSION = [];
    session_unset();
    session_destroy();

    echo"<script language='javascript' type='text/javascript'>alert('você foi desconectado');window.location.href='../index.html';</script>";

?>