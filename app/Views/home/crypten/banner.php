    <section class="banner-area bg_cover d-block d-md-flex align-items-center" style="background-image: url(<?=base_url('assets/home/'.$config["template"].'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="banner-content">
                        <h1 class="title"><?=$bions["title"]?></h1>
                        <p><?=$bions["title2"]?></p>
<?php if($bions["button1"] OR $bions["button2"] ) { ?>

                        <ul>
						<?php if($bions["button1"]) { ?>
                            <li><a class="main-btn" target="_blank" href="<?=$bions["url1"]?>"><?=$bions["button1"]?></a></li>
						<?php } ?>
						<?php if($bions["button2"]) { ?>
                            <li><a class="main-btn main-btn-2" target="_blank" href="<?=$bions["url2"]?>"><?=$bions["button2"]?></a></li>
						<?php } ?>
                        </ul>
<?php } ?>
                        <!--<span>Join us on  <a href="#"><i class="fab fa-facebook-square"></i> 21K</a><a href="#"><i class="fab fa-twitter"></i> 16K</a><a href="#"><i class="fab fa-linkedin"></i> 21K</a></span>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-thumb">
            <img src="<?=base_url($bions["image1"])?>" alt="thumb">
        </div>
    </section>