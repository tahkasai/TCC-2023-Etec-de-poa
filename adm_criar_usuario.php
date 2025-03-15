<?php

    include('php/protect.php');
    include('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuarios</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/styleII.css"/>
    <link rel="stylesheet" href="css/usuarios.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="navigattion">
        <ul>
            <li>
                <a href="adm_inicio.php">
                    <span class="icon"><img src="image/logo.png"></span>
                    <span class="title"><b>Cultura da Paz</b></span>

                </a>
            </li>
            <li class="list active">
                <a href="adm_usuarios.php">
                    <span class="icon"> <ion-icon name="person-outline"></ion-icon> </span>
                    <span class="title">Usuários</span>
                </a>
            </li>
            <li class="list">
                <a href="adm_pendencias.php">
                    <span class="icon"> <ion-icon name="time-outline"></ion-icon> </span>
                    <span class="title">Pendências</span>
                </a>
            </li>
            <li class="list">
                <a href="adm_agenda.php">
                    <span class="icon"> <ion-icon name="calendar-clear-outline"></ion-icon> </span>
                    <span class="title">Agenda</span>
                </a>
            </li>
            <li class="list">
                <a href="php/logout.php">
                    <span class="icon"> <ion-icon name="log-out-outline"></ion-icon> </span>
                    <span class="title"> Logout </span>
                </a>
            </li>
        </ul>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
    <script>
        const list= document.querySelectorAll('.list');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
         item.addEventListener('mouseover',activeLink));
    </script>
    <div class="content-edit">
        <div class="edit-user">
            <a href="adm_usuarios.php" class="voltar"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            <h2>Criar usuário</h2>

            <div class="justify-content">
                <div class="form-edit">
                    <div class="edit-top">
                        <h3>Preencha dos dados</h3>
                    </div><br>
                    <form action="php/criar_usuario.php" method="post" class="form-edit-perfil">

                        <div class="justify-content">
                            <div style="width: 100%;">
                                <label>Nome completo</label>
                                <input name="nome" type="text"><br>
                            </div>
                            <div style="margin-left: 10px;margin-right: 15px; width: 300px;">
                                <label>Data de nascimento</label>
                                <input name="data" type="date"><br>
                            </div>
                        </div>

                        <label>Email</label>
                        <input name="email" type="email"><br>

                        <label>Senha</label>
                        <input name="senha" type="text"><br>

                        <label>Nivel</label>
                        <select name="nivel">
                            <option value="usuario">usuário</option>
                            <option value="administrador">administrador</option>
                        </select><br><br>
                        <button class="button-edit" name="alterar" id="alterar">Criar usuário</button>
                    </form>
                </div>
                <div>
                    <img src="image/img-cria-user.png" alt="">
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>