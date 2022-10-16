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
    $vagas = selectByElement('1',$conexao, " id,cargo, setor,descricao, salario,ativo", "emprego", "id", " WHERE ID = $id");
    // var_dump($vagas);
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
                    <a class="nav-link" href="../vagas/">Vagas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../vagas/vagas.php"><?php if($tipo == 'insert'){ echo "Inserir"; }else{ echo "Editar";} ?></a>
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
        <h5><?php if($tipo == 'insert'){ echo "Inserir Nova Vaga"; }else{ echo "Editar Vaga";} ?></h5>
    </div>

    <div class="widget-content nopadding tab-content">
        <div class="col-md-6">
            <form action="../../poo/VagasService.php?tipo=<?php echo $tipo; if(isset($_GET['id'])){ echo "&id=".$id; }?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label>Cargo: </label>
                    <input class="form-control" name="cargo" required value="<?php if(isset($vagas['cargo'])){ echo $vagas['cargo']; }?>">
                </div>
                <div class="row">
                    <label>Setor: </label>
                    <input class="form-control" name="setor" required value="<?php if(isset($vagas['setor'])){ echo $vagas['setor']; }?>">
                </div>
                <div class="row">
                    <label>Descrição: </label>
                    <input type="text" class="form-control" name="descricao" required value="<?php if(isset($vagas['descricao'])){ echo $vagas['descricao']; }?>">
                </div>
                <div class="row">
                    <label>Salário: </label>
                    <input class="form-control" rows="5" name="salario" required value="<?php if(isset($vagas['salario'])){ echo $vagas['salario']; }?>">
                </div>
                <div class="row">
                    <label>Status: </label>
                    <select class="form-control" name="ativo">
                        <option <?php if(isset($vagas['ativo'])){ echo "selected"; } ?> value="S">Sim</option>
                        <option <?php if(isset($vagas['ativo'])){ echo "selected"; } ?> value="N">Não</option>
                    </select>
                    <!-- <input class="form-control" rows="5" name="ativo" required value="<?php if(isset($vagas['ativo'])){ echo $vagas['ativo']; }?>"> -->
                </div>
                <br>
                <!-- <div class="mb-3">
                    <label>Foto Principal: </label> <?php if(isset($vagas['foto'])){ ?><a href="<?php echo "../../poo/upload/".$vagas['foto']; ?>">Visualizar Foto</a><?php } ?>
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