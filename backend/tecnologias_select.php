<?php

    session_start();
    if (!isset($_SESSION["user_id"])){
        header("Location:login.php");
        exit();
    }
    require("Connection.php");

    use connection\Connection;

    if(isset($_SESSION['user_id'])){
        $query = "SELECT * FROM tecnologias WHERE user_id = ?";
        $conn = new Connection();
        $conexao = $conn->getConnection();
        $stmt = $conexao->prepare($query);
        $data = array();
        try {
            $stmt->execute(array($_SESSION['user_id']));
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) {
                $data[  ] = [
                    "id" => $value["id"],
                    "nome" => $value["nome"],
                    "descricao" => $value["descricao"]
                ];
            }
            echo json_encode($data ? $data : []);
        } catch (PDOException $e) {
            echo "Erro ao consultar banco de dados:".$e->getMessage();
        }
        } else {
            session_destroy();
            header("Location:login.php");
        }



?>