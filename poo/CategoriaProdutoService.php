<?php 
include 'Conexao.php';

$tipo = "";
if(isset($_GET['tipo'])){
    
    $conexao = conexao_base_dados("db_noticias");
    $tipo = $_GET['tipo'];
    if($tipo == 'insert'){
        $descricao = $_POST['descricao'];
        
        insert($conexao, "categoria_produtos", "descricao ", "'".$descricao."'");
        // unlink($nomeFinal); 
    }else if($tipo == 'editar'){
        $id = $_GET['id'];
        $descricao = $_POST['descricao'];
        
        update($conexao, "categoria_produtos", " descricao = '".$descricao."' ", "id = $id");

    }else if($tipo == 'excluir'){
        $id = $_GET['id'];
        delete($conexao, "categoria_produtos", "id = $id");
    }
    
    header("Location: /24-news-master/24-news-master/gerenciador/categoriaProdutos/index.php");
}else{
    header("Location: /index.php");
}
?>