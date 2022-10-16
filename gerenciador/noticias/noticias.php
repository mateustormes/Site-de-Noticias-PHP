<?php 
include '../../poo/Conexao.php';
include '../home/headerGerenciador.php'; 

$tipo = "";
if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}
$conexao = conexao_base_dados("db_noticias");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $noticias = selectByElement('1',$conexao, " id, titulo, descricao, data_publicacao, autor, foto", "noticias", "titulo", " WHERE ID = $id" , "titulo");
    // var_dump($noticias);
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i><span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../home/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../noticias/">Notícias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../noticias/noticias.php"><?php if($tipo == 'insert'){ echo "Inserir"; }else{ echo "Editar";} ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fa fa-documents"></i>
        </span>
        <h5><?php if($tipo == 'insert'){ echo "Inserir Notícias"; }else{ echo "Editar Notícias";} ?></h5>
    </div>
    <div class="col-md-6">
    <center>
        <?php if(isset($noticias['foto'])){ ?>
            <img src="data:image/jpeg;base64,<?= base64_encode($noticias['foto']) ?>" width="30%" height="210em"/>
        <?php }else{ ?>
            <img src="../../images/no_img.png" width="30%" height="210em"/>
        <?php } ?>
    </center>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="col-md-6">
            <form action="../../poo/NoticiasService.php?tipo=<?php echo $tipo; if(isset($_GET['id'])){ echo "&id=".$id; }?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label>Título: </label>
                    <input class="form-control" name="titulo" required value="<?php if(isset($noticias['titulo'])){ echo $noticias['titulo']; }?>">
                </div>
                <div class="row">
                    <label>Autor: </label>
                    <input class="form-control" name="autor" required value="<?php if(isset($noticias['autor'])){ echo $noticias['autor']; }?>">
                </div>
                <div class="row">
                    <label>Data de Publicação: </label>
                    <input type="date" class="form-control" name="dataPublicacao" required value="<?php if(isset($noticias['data_publicacao'])){ echo $noticias['data_publicacao']; }?>">
                </div>
                <div class="row">
                    <label>Descrição: </label>
                    <textarea class="form-control" rows="5" name="descricao" required><?php if(isset($noticias['descricao'])){ echo $noticias['descricao']; }?></textarea>
                </div>
                <div class="mb-3">
                    <input required class="form-control" type="file" name="fotoPrincipal">
                </div>
                <div class="row">
                    <?php if($tipo == 'insert'){ ?>
                        <button type="submit" class="form-control btn btn-info fa fa-plus"></button>
                    <?php }else{ ?>
                            <button type="submit" class="form-control btn btn-info fa fa-pencil"></button>
                    <?php } ?>
                    <button type="submit" class="form-control btn btn-danger fa fa-trash"></button>
                </div>
            </form>            
        </div>
        
    </div>
</div>
        
<?php include '../home/footerGerenciador.php'; ?>