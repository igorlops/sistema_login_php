<?php

require("Connection.php");
use connection\Connection;
session_start();
if (!isset($_SESSION["user_id"])){
    header("Location:login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conn = new Connection();
    $conexao = $conn->getConnection();
    // Verifica se foi clicado na tecnologia
    $data = json_decode(file_get_contents("php://input"));
    if ($data and isset($data->nome_tecnologia)) {
        // Exemplo: Obter dados do formulário
        $nome_tecnologia = $data->nome_tecnologia;
        $descricao_tecnologia = $data->descricao_tecnologia;

        // Realizar operações com os dados recebidos

        $objResponse = [
            "nome_tecnologia" => $nome_tecnologia,
            "descricao_tecnologia" => $descricao_tecnologia,
            "user_id"=> $_SESSION["user_id"],
        ];

        $sql = "INSERT INTO tecnologias (id,nome,descricao,user_id) VALUES (null,?,?,?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute(array($nome_tecnologia,$descricao_tecnologia,$objResponse['user_id']));


        // Enviar uma resposta JSON
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Dados recebidos com sucesso.', 'data' => $objResponse]);

    }else if ($data and isset($data->nome_projeto)) { 
        // Exemplo: Obter dados do formulário
        $nome_projeto = $data->nome_projeto;
        $descricao_projeto = $data->descricao_projeto;
        $tecnologia_projetos = $data->tecnologia_projetos;
        $link_repositorio = $data->link_repositorio;
        $link_servidor = $data->link_servidor;
        
        // Realizar operações com os dados recebidos
        $objResponse = [
            "nome_projeto"=>$nome_projeto,
            "descricao_projeto"=>$descricao_projeto,
            "link_repositorio"=>$link_repositorio,
            "link_servidor"=>$link_servidor,
            "user_id"=> $_SESSION["user_id"],
        ];
        $sql = "INSERT INTO projetos (id,nome,descricao,link_codigofonte,link_servidor,user_id) VALUES (null,?,?,?,?,?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute(array($nome_projeto,$descricao_projeto,$link_repositorio,$link_servidor,$objResponse['user_id']));


        // Exemplo: Enviar uma resposta JSON
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Dados recebidos com sucesso.', 'data' => $objResponse]);

     } else if ($data and isset($data->nome_experiencia)) {
        
        // Exemplo: Obter dados do formulário
        $nome_experiencia = $data->nome_experiencia;
        $data_ini_curso = $data->data_ini_experiencia;
        $data_fim_curso = $data->data_fim_experiencia;
        $empresa = $data->empresa_experiencia;
        $funcao = $data->funcao_experiencia;
        $descricao_experiencia = $data->descricao_experiencia;
        $tecno_experiencia = $data->tecnologia_experiencia;
        
        // Realizar operações com os dados recebidos
        $objResponse = [
            "nome_experiencia"=>$nome_experiencia,
            "data_ini_curso"=>$data_ini_curso,
            "data_fim_curso"=>$data_fim_curso,
            "empresa"=>$empresa,
            "funcao"=>$funcao,
            "descricao_experiencia"=>$descricao_experiencia,
            "user_id"=> $_SESSION["user_id"],
        ];
        $sql = "INSERT INTO experiencias (id,nome,data_ini,data_fin,empresa,funcao,descricao,user_id) VALUES (null,?,?,?,?,?,?,?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute(array($nome_experiencia,$data_ini_curso,$data_fim_curso,$empresa,$funcao,$descricao_experiencia,$objResponse['user_id']));


        // Exemplo: Enviar uma resposta JSON
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Dados recebidos com sucesso.', 'data' => $objResponse]);

    }else if ( $data and isset($data->nome_det_curso)) {
        
        // Exemplo: Obter dados do formulário
        $id_curso = $data->id_curso;
        $nome_det_curso = $data->nome_det_curso;
        $tecno_det_curso = $data->tecnologia_det_curso;
        $nome = $data->descricao_det_curso;
        $email = $data->link_certificado_det_curso;
        
        // Realizar operações com os dados recebidos
        $objResponse = [
            "id_curso" => $id_curso,
            "nome_det_curso"=>$nome_det_curso,
            "descricao_det_curso"=>$descricao_det_curso,
            "link_certificado_det_curso"=>$link_certificado_det_curso,
            "user_id"=> $_SESSION["user_id"],
        ];
        $sql = "INSERT INTO detalhes_cursos (id,id_curso,nome,descricao,link_certificado,user_id) VALUES (null,?,?,?,?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute(array($id_curso,$nome_det_curso,$descricao_det_curso,$link_certificado_det_curso,$objResponse['user_id']));


        // Exemplo: Enviar uma resposta JSON
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Dados recebidos com sucesso.', 'data' => $objResponse]);


    } else if ($data and isset($data->nome_curso)) {
        
        // Exemplo: Obter dados do formulário
        $data_curso = $data->data_curso;
        $nome_curso = $data->nome_curso;
        $plataforma = $data->plataforma_estudo;
        $link_certificado = $data->link_certificado;

        // Realizar operações com os dados recebidos
        $objResponse = [
            "nome_curso"=>$nome_curso,
            "data_curso"=>$data_curso,
            "plataforma"=>$plataforma,
            "link_certificado"=>$link_certificado,
            "user_id"=> $_SESSION["user_id"],
        ];
        $sql = "INSERT INTO cursos (id,nome,data,plataforma_estudo,link_certificado,user_id) VALUES (null,?,?,?,?,?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute(array($nome_curso,$data,$plataforma,$link_certificado ,$objResponse['user_id']));


        // Exemplo: Enviar uma resposta JSON
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success', 'message' => 'Dados recebidos com sucesso.', 'data' => $objResponse]);

    }
     else {
        // A solicitação não foi feita usando o método POST
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Parâmetros inválidos.']);
    }


} else {
    // A solicitação não foi feita usando o método POST
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
}
?>


<!-- Criar tecnologias independentes para salvar -->
<!-- Criar uma lista de tecnologias para os campos já existentes, um lugar reservado apenas para cadastro de tecnologias -->