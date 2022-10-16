<?php 
include 'Conexao.php';

echo "<pre>";
print_r($_FILES);
echo "<br>";
print_r($_GET);
echo "<br>";
print_r($_POST);
echo "</pre>";
$tipo = "";
if(isset($_GET['tipo'])){
    
    $conexao = conexao_base_dados("db_noticias");
    $tipo = $_GET['tipo'];
    if($tipo == 'insert'){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email= $_POST['email'];
        $senha = $_POST['senha'];
        $nivel_acesso = 1;

        
        insert($conexao, "usuario", "nome, cpf, email, senha, nivel_acesso ", "'".$nome."', '".$cpf."', '".$email."', '".$senha."', '".$nivel_acesso."'");
        $usuario = selectByElement('1',$conexao, " id", "usuario", " id desc", "" , "id");
        
        print_r($usuario);
        // die();
            
        gravarImagem($_FILES["fotoPrincipal"], "localhost","root", "", "db_noticias", $usuario['id']);
    }else if($tipo == 'editar'){
        $id = $_GET['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nivel_acesso = 1;
        
        update($conexao, "usuario", "nome = '".$nome."', cpf = '".$cpf."', email = '".$email."', senha = '".$senha."',nivel_acesso = '".$nivel_acesso."'", "id = $id");
        
        gravarImagem($_FILES["fotoPrincipal"], "localhost","root", "", "db_noticias", $id);
    }else if($tipo == 'excluir'){
        $id = $_GET['id'];
        delete($conexao, "usuario", "id = $id");
    }
}else{
    header("Location: /index.php");
}

// header("Location: /24-news-master/24-news-master/gerenciador/usuarios/index.php");

function gravarImagem($files, $host, $username, $password, $db, $id){
    $imagem = $files;
    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "db_noticias";

    if($imagem != NULL) {
        $nomeFinal = time().'.jpg';
        if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal);

            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

            $conexao = mysqli_connect($host,$username,$password) or die("Impossível Conectar");

            @mysqli_select_db($conexao, $db) or die("Impossível Conectar");

            $sql = "UPDATE USUARIO SET FOTO = '$mysqlImg' WHERE ID = $id";

            mysqli_query($conexao, $sql);

            unlink($nomeFinal);
        }
    }
    else {
        echo"Você não realizou o upload de forma satisfatória.";
    }
}
?>