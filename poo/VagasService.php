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
        $cargo = $_POST['cargo'];
        $setor= $_POST['setor'];
        $descricao = $_POST['descricao'];
        $salario = $_POST['salario'];
        $ativo = $_POST['ativo'];

        
        insert($conexao, "emprego", "cargo, setor, descricao, salario, ativo ", "'".$cargo."', '".$setor."', '".$descricao."', ".$salario.", '".$ativo."'");
        // unlink($nomeFinal); 
    }else if($tipo == 'editar'){
        $id = $_GET['id'];
        $cargo = $_POST['cargo'];
        $setor = $_POST['setor'];
        $descricao = $_POST['descricao'];
        $salario = $_POST['salario'];
        $ativo = $_POST['ativo'];
        
        update($conexao, "emprego", " cargo = '".$cargo."', setor = '".$setor."', descricao = '".$descricao."',ativo = '".$ativo."', salario = ".$salario, "id = $id");

    }else if($tipo == 'excluir'){
        $id = $_GET['id'];
        delete($conexao, "emprego", "id = $id");
    }
}else{
    header("Location: /index.php");
}
?>