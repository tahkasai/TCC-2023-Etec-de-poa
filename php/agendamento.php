<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agendamento</title>
</head>
<body>

    <?php

        include('../conexao/conexao.php');
        session_start();
        $mysql = new BancodeDados();
        $mysql->conecta();

        if (isset($_POST['dataselecionada'], $_POST['nomeevento'],$_POST['horario'], $_POST['endereco'], $_POST['numero'], $_POST['referencia'], $_POST['telefone'], $_POST['descricao'])){

            $pdataselecionada = $_POST['dataselecionada'];
            $pnomeevento = $_POST['nomeevento'];
            $pendereço = $_POST['endereco'];
            $pnumero = $_POST['numero'];
            $preferencia = $_POST['referencia'];
            $ptelefone = $_POST['telefone'];
            $pdescricao = $_POST['descricao'];
            $phorario = $_POST['horario'];

            $sqll = "INSERT INTO agenda(id_user, nomeevento, dataselecionada, horario, endereco, numero, referencia, telefone, descricao, confirmacao, finalizado) VALUES ('" . $_SESSION['id'] . "', '$pnomeevento','$pdataselecionada','$phorario','$pendereço', '$pnumero', '$preferencia', '$ptelefone', '$pdescricao', 'pendente','nao')";
            $query = @mysqli_query($mysql->con, $sqll);

            if($query){

                echo "<script language='javascript' type='text/javascript'>alert('Sua palestra foi marcada com sucesso!');window.location.href='../user_agenda.php';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Ocorreu algum erro, tente novamente mais tarde');</script>";
            }

        } else {
           echo "<script language='javascript' type='text/javascript'>alert('Preencha os campos corretamente!');window.location.href='javascript:history.back()';</script>";
        }

    ?>

</body>
</html>