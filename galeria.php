<?php 
include 'header.php'; 
$evento = selectByElement('all',$conexao, " id, titulo, substring(descricao, 0, 30) descricao, DATE_FORMAT(data_evento, '%M %d, %Y') data_evento, responsavel", "eventos", " data_evento LIMIT 5", null);
?>
    <div class="container-fluid pb-4 pt-5">
        <?php foreach($evento as $item){ ?>
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Galeria de Fotos</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="images/39-324x235.jpg" alt=""/></div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="images/joe-gardner-75333.jpg" alt=""/></div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="images/ryan-moreno-98837.jpg" alt=""/></div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img"><img src="images/seth-doyle-133175.jpg" alt=""/></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

<?php include 'footer.php'; ?>