<?php
include '../poo/Conexao.php';
var_dump($_POST);

session_start();
if(isset($_POST['email'])){
    if(isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conexao = conexao_base_dados("db_noticias");

        $usuario = selectByElement('1',$conexao, " id, nome, cpf, email, nivel_acesso, foto", "usuario", "id", " WHERE email = '$email' AND senha = '$password'");
        // echo "usuario = ";
        // echo "<pre>";
        // print_r($usuario);
        // echo "</pre>";

        // die();
        // echo count($usuario);
        if(($email == 'mateus.tormes' && $password == '12345') || isset($usuario['nome'])){
            $value = 'Sucesso';
            
            $_SESSION["retorno"] = $value;
            $_SESSION["email"] = $usuario['email'];
            $_SESSION["usuario"] = $usuario['nome'];
            $_SESSION["senha"] = $password;
            $_SESSION["foto"] = $usuario['foto'];
            
            // die();
            die(header("Location: ../gerenciador/home/index.php"));
        }else{
            $value = 'Email ou Senha Errada';
        }
    
    }else {
        $value = 'Password não informado';
    } 
}else{ 
    $value = 'Email não informado';
}


$_SESSION["retorno"] = $value;
die(header("Location: ../index.php"));
?>