<?php 
include 'header.php'; 

// $noticias = selectByElement('all',$conexao, " id, titulo, descricao, data_publicacao, autor, foto", "noticias", " id ", null);
// echo "<pre>";
// print_r($noticias);
// echo "</pre>";
$id = 1;
$noticias = selectByElement('all',$conexao, " id, titulo, substring(descricao, 0, 30) descricao, DATE_FORMAT(data_publicacao, '%M %d, %Y') data_publicacao, autor, foto", "noticias", " data_publicacao LIMIT 5", null);
$tags = selectByElement('all',$conexao, " id, descricao, status", "tags", null, null);
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>

<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Notícias Atuais</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            <?php foreach($noticias as $item){ ?>
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img">
                        <img class="fh5co_img_special_relative" src="data:image/jpeg;base64,<?= base64_encode($item['foto']) ?>" />
                    </div>
                    <a href="single.php?id=<?php echo $item['id'];?>"> 
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                    </a>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="single.php?id=<?php echo $item['id']; ?>" class="text-white"> <?php echo $item['titulo']; ?> </a>
                        <div class="fh5co_latest_trading_date_and_name_color"> <?php echo $item['autor']." <br> ".$item['data_publicacao']; ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            <?php foreach($noticias as $item){ ?>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_news_img">
                            <img src="data:image/jpeg;base64,<?= base64_encode($item['foto']) ?>" alt=""/>
                        </div>
                        <div>
                            <a href="single.php?id=<?php echo $item['id']; ?>" class="d-block fh5co_small_post_heading"><span class=""><?php echo $item['titulo']; ?></span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> <?php echo $item['data_publicacao']; ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video News</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                <img src="images/ariel-lustre-208615.jpg" alt=""/>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide" id="play-video">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class="">The top 10 funniest videos on YouTube </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video_2" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_2">
                                <img src="images/39-324x235.jpg" alt=""/></div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_2" id="play-video_2">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class="">The top 10 embedded YouTube videos this month</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video_3" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_3">
                                <img src="images/joe-gardner-75333.jpg" alt=""/></div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_3" id="play-video_3">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video_4" width="100%" height="200"
                                        src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_4">
                                <img src="images/vil-son-35490.jpg" alt=""/>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_4" id="play-video_4">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 best computer speakers in the market</span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                <?php foreach($noticias as $item){ ?>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="data:image/jpeg;base64,<?= base64_encode($item['foto']) ?>" alt=""/></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="single.php?id=<?php echo $item['id']; ?>" class="fh5co_magna py-2"> <?php echo $item['titulo']; ?></a> <br>
                            <a href="single.php?id=<?php echo $item['id']; ?>" class="fh5co_mini_time py-3"> <?php echo $item['autor']." - ".$item['data_publicacao']; ?> </a>
                            <div class="fh5co_consectetur"> <?php echo $item['descricao']; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <?php foreach($tags as $item){ ?>
                        <a href="#" class="fh5co_tagg"><?php echo $item['descricao']; ?></a>
                    <?php } ?>  
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <?php foreach($noticias as $item){ ?>
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="data:image/jpeg;base64,<?= base64_encode($item['foto']) ?>" alt="" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> <?php echo $item['titulo']; ?></div>
                            <div class="most_fh5co_treding_font_123"> <?php echo $item['data_publicacao']; ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <?php if($id > 1){ ?>
                    <a href="index.php?id=<?php echo $id-1; ?>" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Anterior</a>
                <?php } ?>
                <a href="index.php?id=<?php echo $id; ?>" class="btn_pagging"><?php echo $id; ?></a>
                <a href="index.php?id=<?php echo $id+1; ?>" class="btn_mange_pagging">Próxima <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>