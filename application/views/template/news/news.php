<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/'); ?>rlpd-logo-125x140.png" type="image/x-icon">
    <title><?= $newsshow->news_name; ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/ba567eae7a.css">
    <!-- Bootstrap and css  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/'); ?>css/bootstrap.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>news/news.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <section class="name">
                    <hr>
                    <h2 class="txt-name"><?= $newsshow->news_name;?></h2>
                    <p>
                        <a href=""><?= $newsshow->officer_name; ?></a>
                        <i class="far fa-clock icon"></i>
                        <time><?= $newsshow->news_postdate;?></time>
                    </p>
                </section>
                <section class="content">
                    <div class="row">
                        <!-- content -->
                        <div class="col-8">
                            <article>
                                <!-- img -->
                                <img src="<?= base_url('assets/upload/news/pic/').$newsshow->news_file; ?>" alt=""><br>
                                <!-- content -->
                                <?= $newsshow->news_detail;?>
                                <!-- file -->
                                <?php if(strchr($newsshow->news_otherfile,".")==".pdf"){ ?>
                                    <h4>เอกสารที่เกี่ยวข้อง</h4>
                                    <embed src="<?= base_url('assets/upload/news/file/').$newsshow->news_otherfile;?>" width="100%" height="900px" />
                                <?php }elseif($newsshow->news_otherfile==""){ ?>
                                    <br>
                                <?php }else{?>
                                    <h4>เอกสารที่เกี่ยวข้อง</h4>
                                    <a href="<?= base_url('assets/upload/news/file/').$newsshow->news_otherfile;?>" class="btn btn-primary" >ดาวน์โหลดเอกสารแนบ</a>
                                <?php } ?>
                            </article>    
                        </div>
                        <!-- nav -->
                        <div class="col">
                            <article>
                                <div class="col">
                                    <nav class="navs">
                                        <div class="container-fluid">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#">ข่าวล่าสุด</a></li>
                                            </ul>
                                        </div>
                                    </nav>  
                                </div>
                                <div class="tab-content">
                                    <ol>
                                    <?php $i=1 ?>
                                    <?php foreach($getnews as $news){  ?>
                                        <li>
                                            <a href="<?= base_url('welcome/news/').$news->news_id.'/'.$news->news_name.'/'.$news->news_postdate; ?>"><?= $news->news_name; ?></a>
                                        </li>
                                        <?php } ?>
                                    </ol>
                                </div>
                            </article>    
                        </div>          
                    </div>
                    <hr>
                </section>
            </div>
        </div>
    </div>
<!-- script -->
<script src="<?php echo base_url('assets/web/'); ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>popper/popper.min.js"></script>
<!-- Font Awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
<!-- <script type="text/javascript" src="js/SmoothScroll.js"></script>  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- customJS -->
</body>
</html>