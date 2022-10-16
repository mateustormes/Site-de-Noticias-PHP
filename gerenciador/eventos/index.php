<?php 
include '../../poo/Conexao.php';
include '../home/headerGerenciador.php'; 

$conexao = conexao_base_dados("db_noticias");

$eventos = selectByElement('all',$conexao, " id, titulo, descricao, data_evento, responsavel", "eventos", " id ", null);
// echo "<pre>";
// print_r($eventos);
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
                    <a class="nav-link" href="../eventos/">Eventos</a>
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
        <h5>Eventos</h5>
    </div>

    <div class="widget-content nopadding tab-content">
        <form class="" action="../eventos/eventos.php" method="POST">
            <input style="display:none;" class="form-control" name="tipo" value="insert">
            <button class="fa fa-plus btn btn-info col-md-3" type="submit"></button>
        </form>    
        <br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Cod.</th>
                <th>Título</th>
                <th>Data da Publicação</th>
                <th>Autor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                <?php if(count($eventos) == 0){ ?>
                    <tr>
                        <td colspan="5">Nenhum Cliente Cadastrado</td>
                    </tr>
                <?php }else{ 
                    foreach($eventos as $notic){
                ?>
                    <tr>
                        <td>
                            <?php echo $notic['id']; ?>
                        </td>                    
                        <td>
                            <?php echo $notic['titulo']; ?>
                        </td>
                        <td>
                            <?php echo date("d/m/Y", strtotime($notic['data_evento'])); ?>
                        </td>
                        <td>
                            <?php echo $notic['responsavel']; ?>
                        </td>
                        <td>
                            <div class="row">
                                <a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="' . base_url() . 'index.php/mine?e=' . $r->email . '&c=' . $r->documento . '" target="new" style="margin-right: 1%" class="btn tip-top" title="Área do cliente">
                                    <i class="fa fa-key"></i>
                                </a>
                                <form class="col-md-3" action="../eventos/eventos.php?id=<?php echo $notic['id']; ?>" method="POST">
                                    <input style="display:none;" class="form-control" name="tipo" value="editar">
                                    <button type="submit" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Eventos">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                                <form class="col-md-3" action="../../poo/EventosService.php?tipo=<?php echo "excluir&id= ".$notic['id']; ?>" method="POST">
                                    <button type="submit" role="button" style="margin-right: 1%" class="btn btn-danger tip-top fa fa-trash" title="Excluir Eventos">
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
                    <th>Título</th>
                    <th>Data da Publicação</th>
                    <th>Autor</th>
                    <th>Ações</th>
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