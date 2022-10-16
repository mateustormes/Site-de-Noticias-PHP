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
        $email= $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];
        
        insert($conexao, "contato", "nome, email, telefone, mensagem ", "'".$nome."', '".$email."', '".$telefone."', '".$mensagem."'");
        // unlink($nomeFinal); 
    }else if($tipo == 'editar'){
        $id = $_GET['id'];
        $nome = $_POST['nome'];
        $email= $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];
        
        update($conexao, "contato", "nome = '".$nome."', email = '".$email."', telefone = '".$telefone."', mensagem = '".$mensagem."'", "id = $id");

    }else if($tipo == 'excluir'){
        $id = $_GET['id'];
        delete($conexao, "contato", "id = $id");
    }
}else{
    header("Location: /index.php");
}
?>