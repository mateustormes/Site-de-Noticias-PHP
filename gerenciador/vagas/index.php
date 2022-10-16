<?php 
include '../../poo/Conexao.php';
include '../home/headerGerenciador.php'; 

$conexao = conexao_base_dados("db_noticias");

$emprego = selectByElement('all',$conexao, " id,cargo, setor,descricao, salario,ativo", "emprego", " id ", null);
// echo "<pre>";
// print_r($emprego);
// echo "</pre>";
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
                <li class="nav-item">
                    <a class="nav-link" href="../vagas/">Vagas de Empregos</a>
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
        <h5>Vagas de Empregos Disponíveis</h5>
    </div>

    <div class="widget-content nopadding tab-content">
        <form class="" action="../vagas/vagas.php" method="POST">
            <input style="display:none;" class="form-control" name="tipo" value="insert">
            <button class="fa fa-plus btn btn-info col-md-3" type="submit"></button>
        </form>    
        <br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Cod.</th>
                <th>Cargo</th>
                <th>Setor</th>
                <th>Descrição</th>
                <th>Salário</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($emprego) == 0){ ?>
                    <tr>
                        <td colspan="5">Nenhuma Vaga de Emprego Cadastrada</td>
                    </tr>
                <?php }else{ 
                    foreach($emprego as $notic){
                ?>
                    <tr>
                        <td>
                            <?php echo $notic['id']; ?>
                        </td>                    
                        <td>
                            <?php echo $notic['cargo']; ?>
                        </td>
                        <td>
                            <?php echo $notic['setor']; ?>
                        </td>
                        <td>
                            <?php echo $notic['descricao']; ?>
                        </td>
                        <td>
                            <?php echo $notic['salario']; ?>
                        </td>
                        <td>
                            <?php echo $notic['ativo']; ?>
                        </td>
                        <td>
                            <div class="row">
                                <a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="' . base_url() . 'index.php/mine?e=' . $r->email . '&c=' . $r->documento . '" target="new" style="margin-right: 1%" class="btn tip-top" title="Área do cliente">
                                    <i class="fa fa-key"></i>
                                </a>
                                <form class="col-md-3" action="../vagas/vagas.php?id=<?php echo $notic['id']; ?>" method="POST">
                                    <input style="display:none;" class="form-control" name="tipo" value="editar">
                                    <button type="submit" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Vagas de Emprego">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                                <form class="col-md-3" action="../../poo/VagasService.php?tipo=<?php echo "excluir&id= ".$notic['id']; ?>" method="POST">
                                    <button type="submit" role="button" style="margin-right: 1%" class="btn btn-danger tip-top fa fa-trash" title="Excluir Vagas de Emprego">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php }
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Cod.</th>
                    <th>Cargo</th>
                    <th>Setor</th>
                    <th>Descrição</th>
                    <th>Salário</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script>
jQuery(document).ready(function($) {
    $('#example').DataTable();
} );
</script>   
<?php include '../home/footerGerenciador.php'; ?>