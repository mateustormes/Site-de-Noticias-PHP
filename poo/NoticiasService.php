<?php 
include 'Conexao.php';


$tipo = "";
if(isset($_GET['tipo'])){
    
    $conexao = conexao_base_dados("db_noticias");
    $tipo = $_GET['tipo'];
    if($tipo == 'insert'){
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data_publicacao = $_POST['dataPublicacao'];
        $autor = $_POST['autor'];

        // if(isset($_FILES['fotoPrincipal'])){
        //     $extensao = strtolower(substr($_FILES['fotoPrincipal']['name'], -4));
        //     $novo_nome = uniqid().$extensao;
        //     $diretorio = "upload/";
        //     move_uploaded_file($_FILES['fotoPrincipal']['tmp_name'],$diretorio.$novo_nome);

        //     insert($conexao, "noticias", "titulo, descricao, data_publicacao, autor, foto", "'".$titulo."', '".$descricao."', '".$data_publicacao."', '".$autor."', '$novo_nome"."'");
        // }else{
            insert($conexao, "noticias", "titulo, descricao, data_publicacao, autor", "'".$titulo."', '".$descricao."', '".$data_publicacao."', '".$autor."'");
            
            $noticias = selectByElement('1',$conexao, " id", "noticias", "id desc", "" , "id");
            print_r($noticias);
            
            gravarImagem($_FILES["fotoPrincipal"], "localhost","root", "", "db_noticias", $noticias['id']);
        // }
        // unlink($nomeFinal); 
    }else if($tipo == 'editar'){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data_publicacao = $_POST['dataPublicacao'];
        $autor = $_POST['autor'];
        $foto = "teste.png";
        update($conexao, "noticias", "titulo = '".$titulo."', descricao = '".$descricao."', data_publicacao = '".$data_publicacao."', autor = '".$autor."', foto = '".$foto."'", "id = $id");

        gravarImagem($_FILES["fotoPrincipal"], "localhost","root", "", "db_noticias", $id);

        // echo '...';

    }else if($tipo == 'excluir'){
        $id = $_GET['id'];
        delete($conexao, "noticias", "id = $id");
    }
    
    
}else{
    header("Location: /index.php");
}
header("Location: /24-news-master/24-news-master/gerenciador/noticias/index.php");

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

            $sql = "UPDATE NOTICIAS SET FOTO = '$mysqlImg' WHERE ID = $id";

            mysqli_query($conexao, $sql);

            unlink($nomeFinal);
        }
    }
    else {
        echo"Você não realizou o upload de forma satisfatória.";
    }
}
?>