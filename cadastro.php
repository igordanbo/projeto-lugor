<?php 

    $conexao = new mysqli("localhost", "root", "123456", "cadastro");

    if($conexao->error){
        echo "Erro na conexão com o banco de dados";
        exit;
    }

    $nome = $_REQUEST["nome"];
    $sobrenome = $_REQUEST["sobrenome"];
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];

    $stmt = $conexao->prepare("INSERT INTO users(nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");

    $stmt->bind_param('ssss', $nome, $sobrenome, $email, $senha);

    if ($stmt->execute()){
        header("Location: index.html");
    }else{
        echo "Erro na inserção dos dados" . $stmt->error;
    }

    $conexao->close();
    



?>