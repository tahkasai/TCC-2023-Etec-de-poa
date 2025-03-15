<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enviar email</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
</body>
</html>

<?php
session_start();
require_once('../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['submit'])) {

$mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'insightgreen23@gmail.com';                     //SMTP username
        $mail->Password   = 'xmxf skqd avgc jugo';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 465 or 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
        $mail->setFrom('insightgreen23@gmail.com', 'CULTURA DA PAZ');
        $mail->addAddress($_POST ['emailrec'], 'quem irá receber este email');     //Add a recipient
        $email=$_POST['emailrec'];
        $_SESSION['email']=$email;

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'O MELHOR SITE DE PALESTRAS ANTI BULLYING DO BRASIL';
       
       $body = "mensagem enviada através do site, segue 
            as informações abaixo:<br>
            E-mail que foi solicitado: ". $_POST ['emailrec']." 
            <br>
            <p> Siga o link abaixo para a alterção da senha</p><a href= 'http://localhost/possivelsite/php/alterar_senha.php'> link para efetuar a alteração</a> 
            <br><br><br>caso essa alteração não foi solicitada, ignore.
            ";


       
        $mail->Body  = $body;

        $mail->send();
        echo '<div class="pag_login"><div class="conteiner_login"><h2>O e-mail enviado com sucesso</h2></div></div>';
        } catch (Exception $e) {
            echo "erro ao enviar ao e-mail: {$mail->ErrorInfo}";
     } 
} else {
    echo "erro ao enviar e-mail, acesso não foi via formulário";
}
header('location: email_enviado.php');
die();
    
?>