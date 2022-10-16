<?php 
include 'Conexao.php';


$tipo = "";
if(isset($_GET['tipo'])){
    
    $conexao = conexao_base_dados("db_noticias");
    $tipo = $_GET['tipo'];
    if($tipo == 'insert'){
        $descricao = $_POST['descricao'];
        $fk_categoria_produto = $_POST['fk_categoria_produto'];
        $preco = $_POST['preco'];

        // if(isset($_FILES['fotoPrincipal'])){
        //     $extensao = strtolower(substr($_FILES['fotoPrincipal']['name'], -4));
        //     $novo_nome = uniqid().$extensao;
        //     $diretorio = "upload/";
        //     move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'],$diretorio.$novo_nome);

        //     insert($conexao, "noticias", "titulo, descricao, data_publicacao, autor, foto", "'".$titulo."', '".$descricao."', '".$data_publicacao."', '".$autor."', '$novo_nome"."'");
        // }else{
            insert($conexao, "produtos", "descricao, fk_categoria_produto, preco", "'".$descricao."', ".$fk_categoria_produto.", ".$preco."");
            
            $produtos = selectByElement('1',$conexao, " id", "produtos", "id desc", "" , "id");
            print_r($produtos);
            
            gravarImagem($_FILES["fotoPrincipal"], "localhost","root", "", "db_noticias", $produtos['id']);
        // }
        // unlink($nomeFinal); 
    }else if($tipo == 'editar'){
        $id = $_GET['id'];
        $descricao = $_POST['descricao'];
        $fk_categoria_produto = $_POST['fk_categoria_produto'];
        $preco = $_POST['preco'];
        $foto = "teste.png";
        update($conexao, "produtos", "descricao = '".$descricao."', fk_categoria_produto = ".$fk_categoria_produto.", preco = ".$preco.", foto = '".$foto."'", "id = $id");

        gravarImagem($_FILES["fotoPrincipal"], "localhost","root", "", "db_noticias", $id);

        // echo '...';

    }else if($tipo == 'excluir'){
        $id = $_GET['id'];
        delete($conexao, "produtos", "id = $id");
    }
    
    
}else{
    header("Location: /index.php");
}
// header("Location: /24-news-master/24-news-master/gerenciador/noticias/index.php");

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

            $sql = "UPDATE PRODUTOS SET FOTO = '$mysqlImg' WHERE ID = $id";

            mysqli_query($conexao, $sql);

            unlink($nomeFinal);
        }
    }
    else {
        echo"Você não realizou o upload de forma satisfatória.";
    }
}
?>