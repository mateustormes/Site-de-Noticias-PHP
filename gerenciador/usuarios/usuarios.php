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
    $usuario = selectByElement('1',$conexao, " id, nome, cpf, email, nivel_acesso, foto", "usuario", "id", " WHERE ID = $id");
    // var_dump($usuario);
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
                    <a class="nav-link" href="../usuarios/">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../usuarios/usuarios.php"><?php if($tipo == 'insert'){ echo "Inserir"; }else{ echo "Editar";} ?></a>
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
        <h5><?php if($tipo == 'insert'){ echo "Inserir Usuários"; }else{ echo "Editar Usuários";} ?></h5>
    </div>

    <div class="col-md-6">
    <center>
        <?php if(isset($usuario['foto'])){ ?>
            <img src="data:image/jpeg;base64,<?= base64_encode($usuario['foto']) ?>" width="30%" height="210em"/>
        <?php }else{ ?>
            <img src="../../images/no_img.png" width="30%" height="210em"/>
        <?php } ?>
    </center>
    </div>
    
    <div class="widget-content nopadding tab-content">
        <div class="col-md-6">
            <form action="../../poo/UsuariosService.php?tipo=<?php echo $tipo; if(isset($_GET['id'])){ echo "&id=".$id; }?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label>Nome: </label>
                    <input class="form-control" name="nome" required value="<?php if(isset($usuario['nome'])){ echo $usuario['nome']; }?>">
                </div>
                <div class="row">
                    <label>Cpf: </label>
                    <input class="form-control" name="cpf" required value="<?php if(isset($usuario['cpf'])){ echo $usuario['cpf']; }?>">
                </div>
                <div class="row">
                    <label>E-mail: </label>
                    <input type="text" class="form-control" name="email" required value="<?php if(isset($usuario['email'])){ echo $usuario['email']; }?>">
                </div>
                <div class="row">
                    <label>Senha: </label>
                    <input class="form-control" rows="5" name="senha" required value="<?php if(isset($usuario['senha'])){ echo $eventos['senha']; }?>">
                </div>
                <br>
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