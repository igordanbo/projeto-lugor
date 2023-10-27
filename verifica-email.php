<?php 
    $conexao = new mysqli("localhost", "root", "123456", "cadastro");

    if(!$conexao){
        die("Erro na conexão com banco de dados!");
    }

    $email = $_REQUEST["email"];

    $stmt = $conexao->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        echo "existe";
    }else{
        echo "nexiste";
    }

    $conexao->close();

?>