<!doctype html>
<html lang="en">
    <head>
  	    <title>Sidebar 01</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    </head>
    <body>
        <?php 
        session_start();
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";

        // echo $_SESSION['usuario'];
        // echo $_SESSION['senha'];
        ?>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/logo.jpg);"></a>
                    <center>
                        <?php if(isset($_SESSION['foto'])){ ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($_SESSION['foto']) ?>" width="100%" height="100em"/>
                        <?php }else{ ?>
                            <img src="../../images/no_img.png" width="30%" height="210em"/>
                        <?php } ?>
                        <h4 style="color:white;"><?php echo $_SESSION['usuario'];?></h4>
                    </center>
	                <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="../home/index.php">Home</a>
                        </li>
                        <li>
                            <a href="../noticias/index.php">Notícias</a>
                        </li>
                        <li>
                            <a href="../eventos/index.php">Eventos</a>
                        </li>
                        <li>
                            <a href="../usuarios/index.php">Usuarios</a>
                        </li>
                        <li>
                            <a href="../vagas/index.php">Vagas de Emprego</a>
                        </li>
                        <li>
                            <a href="../categoriaProdutos/index.php">Categorias de Produto</a>
                        </li>
                        <li>
                            <a href="../produtos/index.php">Produtos</a>
                        </li>
                        <li>
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Relatórios</a>
	                        <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#">Home 1</a>
                                </li>
                                <li>
                                    <a href="#">Home 2</a>
                                </li>
                                <li>
                                    <a href="#">Home 3</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="../../index.php">Sair</a>
                        </li>
	                </ul>

                    <div class="footer">
                        <p>
                            Todos os direitos reservados  <br>
                            <i class="fa fa-heart" aria-hidden="true"></i> 
                            <a style="color: yellow;" target="_blank">Mateus Tormes</a>
                        </p>
                    </div>
	            </div>
    	    </nav>

            <div id="content" class="p-4 p-md-5">
                