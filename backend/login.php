<?php

    require("Connection.php");
    use connection\Connection;

    session_start();
    if (isset($_SESSION["user_id"])) {
        header("Location: index.php");
        exit();
    }


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $conexao = new Connection();
        $getConexao = $conexao->getConnection();
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $query = "SELECT * FROM user WHERE login = :login and senha = :senha";
        $stmt = $getConexao->prepare($query);
        $stmt->bindParam(":login",$login);
        $stmt->bindParam(":senha",$senha);

        try {
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_name"] = $row["name"];
                $_SESSION["user_email"] = $row["email"];
                $_SESSION["user_senha"] = $row["senha"];
                header("Location:index.php");
                exit();
            }else{
                $error = "Usuário não cadastrado";
            }
        }
        catch(PDOException $e) {
            echo "Erro na execução da consulta: ".$e->getMessage();
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>

<div class="card" style="width:400px;margin:30vh auto">
    <div class="card-body">

        <form method="post">
            <h5 class="card-title text-center">Faça o login aqui</h5>
            <div class="input-group input-group mt-5">
                <span class="input-group-text" id="span-login">Login</span>
                <input type="text" class="form-control" name="login" aria-label="Login" aria-describedby="span-login">
            </div>
            <div class="input-group input-group mt-5">
                <span class="input-group-text" id="span-senha">Senha</span>
                <input type="password" class="form-control" name="senha" id="senha_login" aria-label="Senha" aria-describedby="span-senha">
                <span onclick="mostrarSenha()" class="input-group-text" id="senha_oculta">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                </span>
                <span onclick="ocultarSenha()" style="display:none" id="senha_visivel" class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                    </svg>
                </span>
            </div>
            <br/>
            <input type="submit" value="Enviar" style="width:100%" class="mt-3 btn btn-primary"/>
        </form>

        <p class="mt-3">Ainda não possui cadastrado?<span><a href="cadastro.php"> Clique aqui</a></span></p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="./js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>