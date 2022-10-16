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
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data_evento= $_POST['data_evento'];
        $responsavel = $_POST['responsavel'];

        
        insert($conexao, "eventos", "titulo, descricao, data_evento, responsavel", "'".$titulo."', '".$descricao."', '".$data_evento."', '".$responsavel."'");
        // unlink($nomeFinal); 
    }else if($tipo == 'editar'){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data_evento = $_POST['data_evento'];
        $responsavel = $_POST['responsavel'];
        
        update($conexao, "eventos", "titulo = '".$titulo."', descricao = '".$descricao."', data_evento = '".$data_evento."', responsavel = '".$responsavel."'", "id = $id");

    }else if($tipo == 'excluir'){
        $id = $_GET['id'];
        delete($conexao, "eventos", "id = $id");
    }
}else{
    header("Location: /index.php");
}
?>