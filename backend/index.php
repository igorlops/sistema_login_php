<?php
    session_start();
    if (!isset($_SESSION["user_id"])){
        header("Location:login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/global.css">
</head>
<body>

    <header>
        <nav class="navbar navbar-custom">
            <div class="container">

                <div class="logo">
                    <h2>Painel de controle</h2>
                </div>

                <div class="info-navbar">
                    <div class="usuario-logger">
                        <span><?= $_SESSION['user_name'] ?></span>
                    
                        <div class="logout">
                            <a href="logout.php">Sair 
                                <span class="svg_icon_loggout">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="apresentacao-header mt-5">
            <div class="container">
                <h6>Olá, seja bem vindo o que você deseja adicionar agora?</h6>
            </div>
        </section>
    </header>

    <section class="body-principal mt-5">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="secoes_cadastro col-4">
                    <div class="card">
                        <div class="card-header">
                            Lista de atividades
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" onclick="inputSingle('tecnologias');">Tecnologias</li>
                            <li class="list-group-item" onclick="inputSingle('projetos');">Projetos</li>
                            <li class="list-group-item" onclick="inputSingle('experiencias');">Experiências</li>
                            <li class="list-group-item" onclick="inputSingle('cursos');">Cursos</li>
                            <li class="list-group-item" onclick="inputSingle('detalhes_cursos');">Detalhes de cursos</li>
                        </ul>
                    </div>
                </div>
    
                <div class="secao_input_cadastros col-6" id="secao_input_dinamica"></div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="./js/inputs.js"></script>
    <script src="./js/script.js"></script>
    <script>IniciarApp();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>