
<section class="section-table cid-qyLHCxqxRz " id="table1-s" data-rv-view="1217">
<div class="container mbr-fonts-style">
    <div class="row-2 align-center">
        <h2 class="mbr-title pt-2 display-2"><?php echo $lastnews ?></h2>
        <br>
    </div>
    <div class="row">
        <div class="col align-left mbr-figure">
            <div class="row mbr-figure">
                <a class="img-news-div align-middle" href="">
                    <img class="img-news" src="<?= $getNewsTop->news_file; ?>" alt="Img1">
                    <p class="col-3 display-2 pt-2 align-center date-text " id="date-news">
                    <?php 
                        $date = mysql_to_unix($getNewsTop->news_postdate);
                        $d = mdate('%d', $date);
                        $m = mdate('%m', $date);
                        $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                        $m = $month[$m-1];
                        echo $d." ".$m;  
                    ?></p>
                    <div class="display-2 pt-2 align-left align-middle content-news">
                        <h4 class="align-middle" id="cont-news"><?= $getNewsTop->news_name; ?></h4>
                    </div>
                </a>
            </div>
        </div>
    <div class="col">
        <dir class="row">
            <div class="col mbr-fonts-style display-5 content-news-div">
                <?php 
                    foreach($getNews as $n){ ?>
                        <a href=""><p id='<?= $n->news_id ?>'> <?php echo $n->news_name ?></p></a><hr>
                        <!-- start hover -->
                            <script>

                                $( "p#<?php echo $n->news_id ?>" ).hover(
                                    function() 
                                    {
                                        $('.img-news').attr('src','<?= $n->news_file ?>');
                                        $('h4#cont-news').text('<?= $n->news_name ?>');    
                                        $('p#date-news').text('<?php 
                                            $date = mysql_to_unix($n->news_postdate);
                                            $d = mdate('%d', $date);
                                            $m = mdate('%m', $date);
                                            $month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                            $m = $month[$m-1];
                                            echo $d." ".$m; 
                                        ?>');    
                                    }
                                );
                            </script>
                        <!-- end hover -->
                <?php } ?>
            </div>
            
        </dir>
    </div>
</div>          
</section>