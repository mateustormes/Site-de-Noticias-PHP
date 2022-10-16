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
    $eventos = selectByElement('1',$conexao, " id, titulo, descricao, data_evento, responsavel", "eventos", "titulo", " WHERE ID = $id" , "titulo");
    var_dump($eventos);
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
                    <a class="nav-link" href="../eventos/">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../eventos/eventos.php"><?php if($tipo == 'insert'){ echo "Inserir"; }else{ echo "Editar";} ?></a>
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
        <h5><?php if($tipo == 'insert'){ echo "Inserir Eventos"; }else{ echo "Editar Eventos";} ?></h5>
    </div>

    <div class="widget-content nopadding tab-content">
        <div class="col-md-6">
            <form action="../../poo/EventosService.php?tipo=<?php echo $tipo; if(isset($_GET['id'])){ echo "&id=".$id; }?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label>Título: </label>
                    <input class="form-control" name="titulo" required value="<?php if(isset($eventos['titulo'])){ echo $eventos['titulo']; }?>">
                </div>
                <div class="row">
                    <label>Responsável: </label>
                    <input class="form-control" name="responsavel" required value="<?php if(isset($eventos['responsavel'])){ echo $eventos['responsavel']; }?>">
                </div>
                <div class="row">
                    <label>Data do Evento: </label>
                    <input type="date" class="form-control" name="data_evento" required value="<?php if(isset($eventos['data_evento'])){ echo $eventos['data_evento']; }?>">
                </div>
                <div class="row">
                    <label>Descrição: </label>
                    <textarea class="form-control" rows="5" name="descricao" required><?php if(isset($eventos['descricao'])){ echo $eventos['descricao']; }?></textarea>
                </div>
                <!-- <div class="mb-3">
                    <label>Foto Principal: </label> <?php if(isset($eventos['foto'])){ ?><a href="<?php echo "../../poo/upload/".$eventos['foto']; ?>">Visualizar Foto</a><?php } ?>
                    <input class="form-control" type="file" name="fotoPrincipal">
                </div> -->
                <div class="row">
                    <button type="submit" class="form-control btn btn-info fa fa-pencil"></button>
                    <button type="submit" class="form-control btn btn-danger fa fa-trash"></button>
                </div>
            </form>            
        </div>
        
    </div>
</div>
        
<?php include '../home/footerGerenciador.php'; ?>