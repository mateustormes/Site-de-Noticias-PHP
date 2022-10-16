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
    $categoriaProdutos = selectByElement('1',$conexao, " id, descricao", "categoria_produtos", "descricao", " WHERE ID = $id" , "descricao");
    // var_dump($categoriaProdutos);
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
                    <a class="nav-link" href="../categoriaProdutos/">Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../categoriaProdutos/categoriaProdutos.php"><?php if($tipo == 'insert'){ echo "Inserir"; }else{ echo "Editar";} ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="widget-box">
    <div class="widget-title">
        <h5><?php if($tipo == 'insert'){ echo "Inserir Categoria"; }else{ echo "Editar Categoria";} ?></h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="col-md-6">
            <form action="../../poo/CategoriaProdutoService.php?tipo=<?php echo $tipo; if(isset($_GET['id'])){ echo "&id=".$id; }?>" method="POST">
                <div class="row">
                    <label>Descrição: </label>
                    <input class="form-control" name="descricao" required value="<?php if(isset($categoriaProdutos['descricao'])){ echo $categoriaProdutos['descricao']; }?>">
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