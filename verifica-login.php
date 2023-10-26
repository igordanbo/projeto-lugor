<?php 

    //Commit

    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];

    $conexao = new mysqli("localhost", "root", "123456", "cadastro");

    if($conexao->error){
        echo "Erro na conexão";
        return;
    }

    $stmt = $conexao->prepare("SELECT * FROM users WHERE email = ? and senha = ?");
    $stmt->bind_param('ss', $email, $senha);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        echo "existe";
    }else{
        echo "nexiste";
    }



?>