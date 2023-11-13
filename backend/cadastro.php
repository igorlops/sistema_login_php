<?php
    require("Connection.php");

    if(isset($_POST["submit_cadastro"])){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha_cadastro"];
        echo $nome . " " . $email. " " . $senha;


        $conn = new \connection\Connection();
        $conexao = $conn->getConnection();
        $query = "INSERT INTO user (id, name, login, senha) VALUES (null, ?, ?, ?)";
        $stmt = $conexao->prepare($query);
        
        
        try {
            $stmt -> execute(array($nome,$email,$senha));
            header("Location:login.php");
            exit();
        }catch(\PDOException $e) {
            echo "\n". $e->getMessage();
        }    
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>

<div class="card" style="width:400px;margin:30vh auto">
    <div class="card-body">

        <form method="post">
            <h5 class="card-title text-center">Cadastre-se aqui</h5>
            <div class="input-group input-group mt-5">
                <span class="input-group-text" id="span-nome">Nome</span>
                <input type="text" class="form-control" name="nome" aria-label="Nome" aria-describedby="span-nome">
            </div>
            <div class="input-group input-group mt-5">
                <span class="input-group-text" id="span-login">Email</span>
                <input type="text" class="form-control" name="email" aria-label="Login" aria-describedby="span-login">
            </div>
            <div class="input-group input-group mt-5">
                <span class="input-group-text" id="span-senha">Senha</span>
                <input type="text" class="form-control" name="senha_cadastro" aria-label="Senha" aria-describedby="span-senha">
            </div>
            <br/>
            <input type="submit" value="Enviar" name="submit_cadastro" style="width:100%" class="mt-3 btn btn-primary"/>
        </form>

        <p class="mt-3">Já possui cadastrado?<span><a href="login.php"> Clique aqui</a></span></p>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>