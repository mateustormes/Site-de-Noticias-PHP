<?php include 'header.php'; ?>

<div class="container-fluid mb-12">
    <div class="container">
        <div class="col-12 text-center contact_margin_svnit ">
            <div class="text-center fh5co_heading py-2">Acessar Sistema</div>
        </div>
        <center>
        <div class="col-md-6">
            <form action="form/validaAcesso.php" method="POST" class="row" id="fh5co_contact_form">
                <div class="col-12 py-3">
                    <input type="text" class="form-control fh5co_contact_text_box" name="email" placeholder="Informe o seu Email" required/>
                </div>
                <div class="col-12 py-3">
                    <input type="text" class="form-control fh5co_contact_text_box" name="password" placeholder="Informe a sua Senha" required/>
                </div>
                <a href="">Recuperar Senha</a>
                <div class="col-12 py-3 text-center"> <button type="submit" class="btn contact_btn">Acessar</button> </div>
            </form>
        </div>
        </center>
    </div>
</div>

<?php include 'footer.php'; ?>