    
    <div class="page-title-area page-title-2-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <!--<span>BLOCKCHAIN    |    June 19, 2019</span>-->
                        <h3 class="title"><?=$pages->title?></h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="title-social d-flex justify-content-lg-end justify-content-start">
                        <div class="item">
                            <span>Share</span>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-thumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-thumb">
                        <img src="<?=base_url($pages->image1)?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <section class="blog-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-post-item">
                        <div class="blog-post-top-content">
                            <?=$pages->text?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>