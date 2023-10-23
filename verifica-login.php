<?php 

    $email = $_REQUEST['user'];
    $senha = $_REQUEST['password'];

    $conexao = new mysqli('localhost', 'root', '123456', 'cadastro');

    $consult = "SELECT * FROM users WHERE email = ? and senha = ?";

    $stmt = $conexao->prepare($consult);
    $stmt->bind_param('ss', $email, $senha);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0){
        echo "existe";
    }else{
        echo "nexiste";
    }



?>